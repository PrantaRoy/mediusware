

@extends('layouts.app')
@section('content')
    <div class="container-fluid app-body app-home">
        <div class="row">
            <div class="col-md-12">
                <div class="row mb-3 mt-3">
                    <div class="col-lg-4">
                        <form action="{{route('search')}}" method="get">
                            <input type="text" id="myInput" name="name" placeholder="Search for names..">
                            <input type="submit" class="btn btn-primary">
                        </form>
                    </div>
                    <div class="col-lg-4">
                        <form action=" {{route('searchdate')}}" method="get">
                            <input type="text" id="datepicker" placeholder="Select Date" name="date" autocomplete="off">
                            <input type="submit" class="btn btn-primary">
                        </form>
                    </div>

                    <div class="col-lg-4">
                        <form action=" {{route('type')}}" method="get">
                           <select name="type">
                               @foreach($type as $ty )
                                   <option>{{$ty->type}}</option>
                               @endforeach
                           </select>
                            <input type="submit" class="btn btn-primary">
                        </form>
                    </div>

                </div>
                <br>
                <table  class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th class="th-sm">Group Name

                        </th>
                        <th class="th-sm">Group Type

                        </th>
                        <th class="th-sm">Account Name

                        </th>
                        <th class="th-sm">Post Text

                        </th>
                        <th class="th-sm">Time
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($socials as $group)
                    <tr>
                        <td>{{$group->group->name}}</td>
                        <td>{{$group->group->type}}</td>
                        <td>{{$group->group->user->name}}</td>
                        <td>{{str_limit($group->text,50)}}</td>
                        <td>{{$group->created_at->timezone(Session::get('timezone'))->format('M j, Y g:ia')}}</td>
                    </tr>
                        @empty
                        <p>No Group Found</p>
                    @endforelse
                    </tbody>
                    <tfoot>
                    <tr>
                        <th class="th-sm">Group Name

                        </th>
                        <th class="th-sm">Group Type

                        </th>
                        <th class="th-sm">Account Name

                        </th>
                        <th class="th-sm">Post Text

                        </th>
                        <th class="th-sm">Time
                        </th>
                    </tr>
                    </tfoot>
                </table>
                {{ $socials->links() }}
            </div>
        </div>

    </div>
    @endsection

@push('js')
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $( function() {

            $( "#datepicker" ).datepicker();
            var dateTypeVar = $('#datepicker').datepicker('getDate');
            $.datepicker.formatDate('dd-mm-yy', dateTypeVar);
        } );
    </script>

    @endpush