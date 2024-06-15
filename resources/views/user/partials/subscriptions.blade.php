<div class="container">
  <h1 class="text-center mb-5">Available Subscription Packages</h1>
  @if (session('message'))
      <div class="alert alert-success" role="alert">
          {{ session('message') }}
      </div>
  @endif
  <div class="row row-cols-1 row-cols-md-3">
      @foreach ($subscriptions as $subscription)
          <div class="col mb-4">
              <div class="card h-100 rounded shadow">
                  <div class="card-body d-flex flex-column">
                      <h3 class="card-title text-center">{{ $subscription->name }}</h3>
                      <p class="card-text">{{ $subscription->description }}</p>
                      <ul class="list-group list-group-flush flex-grow-1">
                          <li class="list-group-item"><strong>Duration:</strong> {{ $subscription->duration }} Months</li>
                          <li class="list-group-item"><strong>Price:</strong> {{ $subscription->price }} TND</li>
                      </ul>
                      <form action="{{ route('subscription.subscribe', $subscription) }}" method="POST">
                          @csrf
                          <button type="submit" class="btn btn-primary btn-block mt-3">Subscribe</button>
                      </form>
                  </div>
              </div>
          </div>
      @endforeach
  </div>
</div>
