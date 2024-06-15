<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg p-3 mb-5 bg-white rounded">
                <div class="card-header bg-primary text-white">
                    <h4><i class="bi bi-plus-circle-fill"></i> Ajouter une Session</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('sessions.store') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="name" class="form-label"><i class="bi bi-card-heading"></i> Nom de la Session</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="coach_id" class="form-label"><i class="bi bi-person"></i> Sélectionner un Coach</label>
                                <div class="btn-group w-100">
                                    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="bi bi-person"></i> Sélectionner un Coach
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        @foreach($coaches as $coach)
                                            <a class="dropdown-item" href="#" data-value="{{ $coach->id }}">{{ $coach->name }}</a>
                                        @endforeach
                                    </div>
                                    <input type="hidden" name="coach_id" id="coach_id">
                                </div>
                            </div>
                            <div class="col">
                                <label for="user_id" class="form-label"><i class="bi bi-people"></i> Sélectionner un Utilisateur</label>
                                <div class="btn-group w-100">
                                    <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="bi bi-people"></i> Sélectionner un Utilisateur
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        @foreach($users as $user)
                                            <a class="dropdown-item" href="#" data-value="{{ $user->id }}">{{ $user->name }}</a>
                                        @endforeach
                                    </div>
                                    <input type="hidden" name="user_id" id="user_id">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="start_date" class="form-label"><i class="bi bi-calendar2-event"></i> Date et Heure de Début de la Session</label>
                            <input type="datetime-local" name="start_date" id="start_date" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="end_date" class="form-label"><i class="bi bi-calendar2-check"></i> Date et Heure de Fin de la Session</label>
                            <input type="datetime-local" name="end_date" id="end_date" class="form-control">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Ajouter la Session</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        document.querySelectorAll('.dropdown-menu a').forEach(item => {
            item.addEventListener('click', event => {
                let button = event.target.closest('.btn-group').querySelector('.dropdown-toggle');
                let input = event.target.closest('.btn-group').querySelector('input[type="hidden"]');
                button.textContent = event.target.textContent;
                input.value = event.target.getAttribute('data-value');
            });
        });
    });
</script>
