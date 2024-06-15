<div class="container">
    <h1 class="text-center mb-4">Matched Coaches</h1>
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="row justify-content-center">
        @foreach ($matches as $match)
            @php
                $percentage = isset($match['percentage']) ? $match['percentage'] : null;
            @endphp
            @if($percentage !== null && $percentage > 0)
                <div class="col-md-4">
                    <div class="card border-primary mb-4">
                        <div class="card-body">
                            <h5 class="card-title text-primary">{{ $match['coach']->name }}</h5>
                            @if($percentage != 0)
                                <p class="card-text">Match Percentage: {{ $percentage }}%</p>
                            @else
                                <p class="card-text">Match Percentage: N/A</p>
                            @endif
                            <form action="{{ route('matches.match', $match['coach']->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary btn-block">Choose this Coach</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</div>
