<div class="sub-header-container">
    <header class="header navbar navbar-expand-sm">
        <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></a>

        <ul class="navbar-nav flex-row" style="width:100%">
            <li style="width:100%;display: flex; flex-direction: row; align-items: center; justify-content: space-between">
                <div class="page-header">

                    <nav class="breadcrumb-one" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            @yield('page_navigation')
                        </ol>
                    </nav>

                </div>

                @if(auth()->user()->is_ghost)

                <div style="margin-right: 17px;">
                    <select class="form-control" style="height:34px;font-size: 11px;max-width: 120px" id="ghostMode_branch">
                        @foreach(\App\Models\Branch::get() as $branch)

                            <option value="{{$branch->branch_id}}" {{$branch->branch_id == auth()->user()->user_branch ? 'selected' : ''}}>{{$branch->branch_name}}</option>
                        @endforeach
                    </select>
                </div>

                @endif

            </li>
        </ul>
        @yield('page_actions')
    </header>
</div>
