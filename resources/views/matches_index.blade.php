@extends('layout')

@section('content')
    <div class="container mt-5">
        <h2 class="mb-4 text-center text-primary">Список матчей</h2>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="table-responsive shadow-sm bg-light p-3 rounded">
                    <table class="table align-middle text-center">
                        <thead class="bg-primary text-white">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Команда 1</th>
                            <th scope="col">Команда 2</th>
                        </tr>
                        </thead>
                        <tbody class="table-light">
                        @forelse($matches as $match)
                            <tr>
                                <td class="fw-bold align-middle">
                                    <a href="{{ route('matches_show', $match->id) }}" class="text-decoration-none text-primary fw-semibold">
                                        {{ $match->id }}
                                    </a>
                                </td>
                                <td class="align-middle">{{ $match->team1_name }}</td>
                                <td class="align-middle">{{ $match->team2_name }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-secondary">Матчей пока нет</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
