<table class="table table-striped table-bordered table-hover dataTables-example" >
    <thead>
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Email</th>
        <th>Balance</th>
        <th>Status</th>
        <th>Phone</th>
        <th>City</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @if(count($resellers)>0)
        @foreach($resellers as $k=>$v)
            @php
                $accountType = $v['accountType'];

            @endphp
            <tr class="gradeX">
                <td>{{$v['id']}}</td>
                <td>{{$v['name']}}</td>
                <td class="center">{{$v['email']}}</td>
                <td>{{$v['balance']}}</td>
                <td class="center">{{account_status[$v['status']]}}</td>{{--
                                                    <td class="text-center">{{payment_status[$v['payment_status']]}}</td>--}}
                <td class="center">{{$v['phone']}}</td>
                <td class="center">{{$v['city']}}</td>
                <!-- user status -->
                <td class="text-center">
                    <a href="{{route('users.editUser',$v['id'])}}" class="btn btn-xs btn-info" title="Edit">
                        <i class="fa fa-edit">  </i>
                    </a>
                    @if($v['status'] == "waiting")
                        <a href="{{route('users.updateStatus',['type'=>'account','status'=>'active','id'=>$v['id']])}}" class="btn btn-xs btn-success" title="{{account_status['active']}}">
                            <i class="fa fa-check">  </i>
                        </a>
                    @endif
                    @if($v['status'] == "active")
                        <a href="{{route('users.updateStatus',['type'=>'account','status'=>'waiting','id'=>$v['id']])}}" class="btn btn-xs btn-info" title="{{account_status['waiting']}}">
                            <i class="fa fa-circle-o">  </i>
                        </a>
                        <a href="{{route('users.updateStatus',['type'=>'account','status'=>'deceased','id'=>$v['id']])}}" class="btn btn-xs btn-primary" title="{{account_status['deceased']}}">
                            <i class="fa fa-universal-access">  </i>
                        </a>
                        <a href="{{route('users.updateStatus',['type'=>'account','status'=>'cancelled','id'=>$v['id']])}}" class="btn btn-xs btn-danger" title="{{account_status['cancelled']}}">
                            <i class="fa fa-stop-circle">  </i>
                        </a>
                    @endif
                    @if($v['status'] == "cancelled")
                        <a href="{{route('users.updateStatus',['type'=>'account','status'=>'active','id'=>$v['id']])}}" class="btn btn-xs btn-success" title="{{account_status['active']}}">
                            <i class="fa fa-check">  </i>
                        </a>
                    @endif
                    <a href="{{route('users.delete',['id'=>$v['id']])}}" class="btn btn-xs btn-danger" title="Delete user account">
                        <i class="fa fa-times">  </i>
                    </a>
                </td>
            </tr>
        @endforeach
    @endif
    </tbody>
</table>