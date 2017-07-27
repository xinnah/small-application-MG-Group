@extends('layout.app')
	@section('content')
    <style type="text/css">
        form{display: inline;}
        .form-group{width: 100%;height: auto; overflow: hidden; display: block !important; margin: 5px;}
        .form-control{width: 100% !important;}
    </style>
	<!-- begin #content -->
	<div id="content" class="content">
		
		
		<div class="row">
		    <div class="col-md-12">
                <div class="panel panel-inverse">
                    <div class="panel-heading">
                        <div class="panel-heading-btn">
                            <a class="btn btn-info btn-xs" href="{{URL::to('/products/create')}}">Add New Product</a>
                            
                        </div>
                        <h4 class="panel-title">Product Page </h4>
                    </div>
                    <div class="panel-body">
                        <table id="data-table" class="table table-striped table-bordered nowrap" width="100%">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Product Id</th>
                                    <th>Product Name</th>
                                    <th>Category Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $i=0; ?>
                            @foreach($getProducts as $product)
                            <?php $i++; ?>
                                <tr class="odd gradeX">
                                    <td>{{$i}}</td>
                                    <td>{{$product->product_id}}</td>
                                    <td>{{$product->product_name}}</td>
                                    <td>{{$product->category_name}}</td>
                                    
                                    <td>
                                    <!-- edit section -->
                                        <a href="ui_modal_notification.html#modal-dialog<?php echo $product->id;?>" class="btn btn-sm btn-success" data-toggle="modal"><i class="fa fa-pencil-square-o" aria-hidden="true" style="font-size: 18px;"></i></a>
                                        <!-- #modal-dialog -->
                                        <div class="modal fade" id="modal-dialog<?php echo $product->id;?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                {!! Form::open(array('route' => ['products.update',$product->id],'class'=>'form-horizontal author_form','method'=>'PUT','files'=>'true', 'id'=>'commentForm','role'=>'form','data-parsley-validate novalidate')) !!}
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        <h4 class="modal-title">Product</h4>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label class="control-label col-md-4 col-sm-4" for="product_name">product Name * :</label>
                                                        <div class="col-md-8 col-sm-8">
                                                            <input class="form-control" type="text" id="product_name" name="product_name" value="{{$product->product_name}}" data-parsley-required="true" />
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    <div class="form-group">
                                                        <label class="control-label col-md-4 col-sm-4" for="specification">Product Category *:</label>
                                                        <div class="col-md-8 col-sm-8">
                                                            <select class="form-control" id="select-required" name="fk_category_id" data-parsley-required="true">
                                                                
                                                                @foreach($getCategories as $category)
                                                                    <option value="<?php echo $category->id; ?>"@if($product->fk_category_id == $category->id){{ "selected" }} @endif>{{ $category->category_name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    
                                                    <div class="form-group">
                                                        <label class="control-label col-md-4 col-sm-4" for="summery">Product Details  :</label>
                                                        <div class="col-md-8 col-sm-8">
                                                            <textarea class="form-control" id="Details" name="product_details" rows="4"  placeholder="Details"><?php echo $product->product_details; ?></textarea>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="product_id" value="<?php echo $product->product_id; ?>">   
                                                    <div class="modal-footer">
                                                        <a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>
                                                        <button type="submit" class="btn btn-sm btn-success">Update</button>
                                                    </div>
                                                {!! Form::close(); !!}
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end edit section -->

                                        <!-- delete section -->
                                        {!! Form::open(array('route'=> ['products.destroy',$product->id],'method'=>'DELETE')) !!}
                                            {{ Form::hidden('id',$product->id)}}
                                            <button type="submit" onclick="return confirmDelete();" class="btn btn-danger">
                                              <i class="fa fa-trash-o" aria-hidden="true"></i>
                                            </button>
                                        {!! Form::close() !!}
                                        <!-- delete section end -->
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
		    </div>
		</div>
	</div>
	<!-- end #content -->
	
<script src="{{asset('public/plugins/jquery/jquery-1.9.1.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        App.init();
        TableManageResponsive.init();
    });
</script>
@endsection
