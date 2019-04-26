@extends('layout.admins')

@section('title', $title)

@section('content')
<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>
            <i class="icon-table">
            </i>
            {{$title}}
        </span>
    </div>
    <div class="mws-panel-body no-padding">
        <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
        
        @if(session('success'))
        <div class="mws-form-message info">
            {{session('success')}}
        </div>
        @endif

            <form action="/admin/user" method='get'>
                <div id="DataTables_Table_1_length" class="dataTables_length">
                    <label>
                        显示
                        <select size="1" name="num" aria-controls="DataTables_Table_1">
                            <option value="10" @if($request->num == 10) selected="selected" @endif>
                                10
                            </option>
                            <option value="20" @if($request->num == 20) selected="selected" @endif>
                                20
                            </option>
                            <option value="30" @if($request->num == 30) selected="selected" @endif>
                                30
                            </option>
                        </select>
                        条数据
                    </label>
                </div>
                <div class="dataTables_filter" id="DataTables_Table_1_filter">
                    <label>
                        用户名:
                        <input type="text" name='search' value="{{$request->search}}" aria-controls="DataTables_Table_1">
                    </label>

                    <label>
                        邮箱:
                        <input type="text" name='email' value="{{$request->email}}" aria-controls="DataTables_Table_1">
                    </label>

                    <button class='btn btn-info'>搜索</button>
                </div>

            </form>


            <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1"
            aria-describedby="DataTables_Table_1_info">
                <thead>
                    <tr role="row">
                        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending"
                        style="width: 30px;">
                            ID
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"
                        style="width: 80px;">
                            用户名
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending"
                        style="width: 96px;">
                            邮箱
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending"
                        style="width: 100px;">
                            手机号
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending"
                        style="width: 97px;">
                            头像
                        </th>
                         <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending"
                        style="width: 50px;">
                            状态
                        </th>

                         <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending"
                        style="width: 97px;">
                            操作
                        </th>
                    </tr>
                </thead>
                <tbody role="alert" aria-live="polite" aria-relevant="all">

                    @foreach($res as $k => $v)

                    @if($k % 2 == 0)
                    <tr class="odd">
                    @else
                    <tr class="even">
                    @endif
                        <td class="">
                            {{$v->id}}
                        </td>
                        <td class=" ">
                            {{$v->name}}
                        </td>
                        <td class=" ">
                            {{$v->email}}
                            
                        </td>
                        <td class=" ">
                            {{$v->phone}}
                        </td>
                        <td class=" ">
                            <img src="{{$v->profile}}" alt="" style='width: 70px'>
                        </td>
                        <td class=" ">
                             <!-- 三元运算符 -->
                            {{--$v->status ? '开启' : '禁用'--}}
                            
                            <!-- 自定义函数 -->
                            {{sta($v->status)}}
                        </td>
                        <td class=" ">
                          <a class='btn btn-info' href="/admin/userrole/{{$v->id}}">角色</a>
                            <a class='btn btn-warning' href="/admin/user/{{$v->id}}/edit">修改</a>

                            <form style='display:inline' action="/admin/user/{{$v->id}}" method='post'>
                                {{csrf_field()}}

                                {{method_field('DELETE')}}

                                <button class='btn btn-danger'>删除</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="dataTables_info" id="DataTables_Table_1_info">
                显示当前页从 {{$res->firstItem()}} 到 {{$res->lastItem()}} 总共  {{$res->count()}} 条数据


                <!-- 每页显示几条数据 -->
                <!-- {{$res->count()}} -->
                <!-- 显示每页的页码 -->
                <!-- {{$res->currentPage()}} -->

                <!-- 每页的数据从哪开始 -->
                <!-- {{$res->firstItem()}} -->

                <!-- 返回的是boolean true false -->
                <!-- {{$res->hasMorePages()}} -->

                <!-- 每页显示最后的数据 -->
                <!-- {{$res->lastItem()}} -->

                <!-- 最后的页码数 -->
                <!-- {{$res->lastPage()}} -->

                <!-- http://myapp.cn/admin/user?page=5
                    返回的是下一页的链接地址
                 -->
                <!-- {{$res->nextPageUrl()}} -->

                <!--  -->
                <!-- {{$res->perPage()}}  ???? -->

                 <!-- http://myapp.cn/admin/user?page=5
                    返回的是上一页的链接地址
                 -->
                <!-- {{$res->previousPageUrl()}} -->


                <!-- 获取总数据 -->
                <!-- {{$res->total()}} -->

                <!-- 
                    $results->url($page)

                    获取指定页码的url地址
                 -->
                 <!-- {{$res->url(4)}} -->



            </div>
            
            <style>
                .pagination{
                    
                    margin:0px;
                }

                .pagination li{
                    float: left;
                    height: 20px;
                    padding: 0 10px;
                    display: block;
                    font-size: 12px;
                    line-height: 20px;
                    text-align: center;
                    cursor: pointer;
                    outline: none;
                    background-color: #444444;
                    text-decoration: none;
                    border-right: 1px solid rgba(0, 0, 0, 0.5);
                    border-left: 1px solid rgba(255, 255, 255, 0.15);
                    box-shadow: 0px 1px 0px rgba(0, 0, 0, 0.5), inset 0px 1px 0px rgba(255, 255, 255, 0.15);
                
                }

                .pagination a{
                    color:#fff;
                }

                .pagination .active{
                    background-color: #97c730;
                    color: #323232;
                    border: none;
                    background-image: none;
                    box-shadow: inset 0px 0px 4px rgba(0, 0, 0, 0.25);
                }

                .pagination .disabled{
                    color: #666666;
                    cursor: default;
                }
            </style>

            <div class="dataTables_paginate paging_full_numbers" id="DataTables_Table_1_paginate">
                {{--$res->appends($request->all())->render()--}}
                {{$res->appends($request->all())->links()}}
            </div>
        </div>
    </div>
</div>

@stop

@section('js')
<script>
    setTimeout(function(){
        $('.mws-form-message').slideUp(1200);
    },3000)
</script>
@stop