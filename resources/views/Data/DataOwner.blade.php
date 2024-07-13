<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data Owner</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="card-boddy">
        <div class="col-12">
            <ul class="list-group list-group-flush">
                <div class="row">
                    <table class="table col-12">
                        <thead>
                            <tr>
                                <th scope="col">Owner Name</th>
                                <th scope="col">Shope Name</th>
                                <th scope="col">Password</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="mt-1">
                            @for ($i = 0; $i < 10; $i++)
                                <tr>
                                    <th scope="row">{{ $i }}</th>
                                    <td>{{ fake()->name }}</td>
                                    <td>{{ fake()->name }}</td>
                                    <td>
                                        <div class="row">
                                            <a href="{{ route('OwnerForm') }}" class="btn btn-warning">Edit</a>
                                            <a href="#" class="btn btn-danger">Delete</a>
                                        </div>
                                    </td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
            </ul>
        </div>
    </div>
</div>
