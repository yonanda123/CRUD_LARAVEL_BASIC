<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/js/app.js', 'resources/css/app.scss'])

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!--Regular Datatables CSS-->
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
    <!--Responsive Extension Datatables CSS-->
    <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">

    <!--Datatables -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>

    <!-- Sweet Alert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            var table = $('#example').DataTable({
                    responsive: true
                })
                .columns.adjust()
                .responsive.recalc();
        });
    </script>



</head>
<!-- Button trigger modal -->


<body>
    <div class="container p-3">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create">
            Create
        </button>
        <!-- Modal -->
        <div class="modal fade" id="create" tabindex="-1" aria-labelledby="createLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="createLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('insert') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="modal-body">
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text" id="addon-wrapping">Name</span>
                                    <input type="text" class="form-control" placeholder="Name" aria-label="Name"
                                        name="name" aria-describedby="addon-wrapping">
                                </div>
                            </div>
                            <div class="modal-body">
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text" id="addon-wrapping">Address</span>
                                    <input type="text" class="form-control" placeholder="Name" aria-label="Name"
                                        name="address" aria-describedby="addon-wrapping">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Addres</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($test as $show)
                    <tr>
                        <td>{{ $show->name }}</td>
                        <td>{{ $show->address }}</td>
                        <td>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#update">
                                update
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="update" tabindex="-1" aria-labelledby="updateLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="updateLabel">Modal title</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('update') }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                <div class="input-group flex-nowrap">
                                                    <span class="input-group-text" id="addon-wrapping">ID</span>
                                                    <input type="text" class="form-control" placeholder="Name"
                                                        aria-label="Name" name="id" value="{{ $show->id }}"
                                                        aria-describedby="addon-wrapping">
                                                </div>
                                            </div>
                                            <div class="modal-body">
                                                <div class="input-group flex-nowrap">
                                                    <span class="input-group-text" id="addon-wrapping">Name</span>
                                                    <input type="text" class="form-control" placeholder="Name"
                                                        aria-label="Name" name="name" value="{{ $show->name }}"
                                                        aria-describedby="addon-wrapping">
                                                </div>
                                            </div>
                                            <div class="modal-body">
                                                <div class="input-group flex-nowrap">
                                                    <span class="input-group-text" id="addon-wrapping">Address</span>
                                                    <input type="text" class="form-control" placeholder="Name"
                                                        aria-label="Name" name="address" value="{{ $show->address }}"
                                                        aria-describedby="addon-wrapping">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <a href="javascript:void(0)" data-id_test="{{ $show->id }}" class="btn-delete-test btn btn-danger">
                                Delete
                            </a>
                        </td>
                    </tr>
                @endforeach
        </table>
    </div>
    <script>
        $("body").on('click', '.btn-delete-test', function() {
            const id = $(this).data("id_test");
            console.log(id);
            const swalWithTailwindButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger',
                },
                buttonsStyling: false
            })

            swalWithTailwindButtons.fire({
                title: 'Are you sure?',
                text: "You won't be deleted this data!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch(`/${id}`).then(() => {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Deleted!',
                            text: 'Your data has been deleted',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        setTimeout(function() {
                            window.location.reload();
                        }, 1500);
                    });

                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithTailwindButtons.fire(
                        "Canceled!",
                        "You canceled delete data",
                        "error"
                    )
                }
            })
        })
    </script>
</body>


</html>
