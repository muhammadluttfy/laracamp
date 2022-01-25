@extends('layouts.app')

@section('content')
    <div class="container" style="margin-top: 75px; margin-bottom: 100px">
        <div class="row d-flex justify-content-center">
            <div class="col-10">
                <div class="table-responsive">
                    @include('components.alert')
                    <div class="d-flex mb-3">
                        <input class="form-control" type="text" id="myInput" onkeyup="myFunction()"
                            placeholder="Search by name" title="Type in a name">
                    </div>
                    <table class="table table-bordered table-responsive" id="myTable">
                        <thead>
                            <tr class="table-dark">
                                <th scope="col">User</th>
                                <th scope="col">Camp</th>
                                <th scope="col">Price</th>
                                <th scope="col">Register Date</th>
                                <th scope="col">Paid Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($checkouts as $checkout)
                                <tr>
                                    <td>{{ $checkout->user->name }}</td>
                                    <td>{{ $checkout->Camp->title }}</td>
                                    <td>{{ $checkout->Camp->price }}</td>
                                    <td>{{ $checkout->created_at->format('M d Y') }}</td>
                                    <td>
                                        @if ($checkout->is_paid)
                                            <span class="badge rounded-pill bg-success">Paid</span>
                                        @else
                                            <span class="badge rounded-pill bg-warning">Waiting</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if (!$checkout->is_paid)
                                            <form action="{{ route('admin.checkout.update', $checkout->id) }}"
                                                method="post">
                                                @csrf
                                                <button class="btn btn-primary btn-sm py-2 px-3">Set to Paid</button>
                                            </form>
                                        @endif
                                    </td>
                                @empty
                                <tr colspan="3">No camp registered</tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>


    <script>
        function myFunction() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
@endsection
