@extends('admin.master')
@section('css')
<style type="text/css">
	.one-line{
		overflow: hidden;
		text-overflow: ellipsis;
		white-space: nowrap;
		color: #fff;
	}

	.caption{
		position: absolute;
		left: 0px;
		z-index: 5;
		width: 100%;
		color: #fff;
		bottom: 0;
		cursor: default;
	}

	.dropdown {
		position: relative;
		display: inline-block;
		vertical-align: middle;
	}

	.dropdown-menu{
		min-width: 110px;
	}

	.overlay{
		position: absolute;bottom: 0;left: 0;width: 100%;;height: 90px;z-index: 1;background: linear-gradient(transparent, rgba(0, 0, 0, .7));
	}

	.thumb{
		height: 235px;
		background-repeat: no-repeat;
    	background-position: center;
    	background-size: cover;
    	cursor: pointer;
	}

	.thumbnail .caption, .thumbnail .caption a{
		color:#fff;
	}

	.thumbnail .caption .dropdown-menu a{
		color:#000;
	}

	.img-responsive{
		margin: auto;
	}

	.cover-box{
		position: relative;
		border: 3px dashed #eeeeee;
		min-height: 235px;
		border-radius: 2px;
		background-color: #fcfcfc;
		padding: 5px;
		cursor: pointer;
	}

	.cover-box::before{
		content: '\ea0e';
		font-family: 'icomoon';
		font-size: 64px;
		position: absolute;
		top: 48px;
		width: 64px;
		height: 64px;
		display: inline-block;
		left: 50%;
		margin-left: -32px;
		line-height: 1;
		z-index: 2;
		color: #ddd;
		text-indent: 0;
		font-weight: normal;
		-webkit-font-smoothing: antialiased;
	}

	.cover-box span{
		font-size: 19px;
		margin-top: 130px;
		color: #bbb;
		text-align: center;
		font-weight: 500;
		text-shadow: 0 1px 1px #fff;
		position: absolute;
		left: 0;
		right: 0;
	}
</style>
@endsection
@section('content')
<div ng-controller="MediaGroupController"> 
	<div class="panel-heading bg-primary">
		<h1 class="panel-title text-semibold">Media</h1>
		<div class="heading-elements">
			<button class="btn bg-slate-800" ng-click="modal()"><i class="icon-plus-circle2"></i> Create New</button>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-lg-3 col-sm-6" ng-repeat="x in lists">
			<div class="thumbnail">
				<div class="thumb" style="background-image: url('@{{MEDIA_PATH + '/' + x.name + '/' + x.cover | noCache}}');">
					<div ng-click="enter(x.id)" style="width: 100%;height: 100%;z-index: 1"></div>
					<div class="overlay"></div>
					<div class="caption">
						<div class="row">
							<h6 class="no-margin one-line">
								@{{x.name}}
							</h6>
						</div>
						
							<span class="pull-left">@{{x.count}} Files</span>
							<div class="dropdown pull-right">
								<a href="javascript:void(0)" data-toggle="dropdown"><i class="icon-three-bars"></i></a>
								<ul class="dropdown-menu dropdown-menu-left">
									<li><a href="javascript:void(0)" ng-click="modal(x)"><i class="icon-pencil7"></i> Edit</a></li>
									<li><a href="javascript:void(0)" ng-click="delete(x.id)"><i class="icon-trash"></i> Remove</a></li>
								</ul>
							</div>
							<div class="clearfix"></div>
						
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="form" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form name="form" ng-submit="submit()">
					<div class="modal-header bg-cakebox">
						<button type="button" data-dismiss="modal" class="close">×</button>
						<h6 class="modal-title">Media Group</h6>
					</div>
					<div class="modal-body">
						<div class="cover-box" ng-click="choose_file()" ng-show="!form.cover">
							<span>Click for choose cover.</span>
						</div>
						<img ng-src="@{{MEDIA_PATH + '/' + formView.name + '/' + formView.cover | viewURL}}" id="cover_preview" class="img-responsive" ng-show="form.cover" style="cursor: pointer;" ng-click="choose_file()">
						<p align="center" class="text-grey" ng-show="form.cover">Click image again for choose new cover.</p>
						<div class="form-group">
							<input type="file" name="file" id="cover" class="hidden" accept="image/*"/>
						</div>
						<div class="form-group">
							<label><b>Name</b></label>
							<input type="text" placeholder="Name..." ng-model="form.name" name="name" class="form-control"/>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" data-dismiss="modal" class="btn btn-link"> <i class="icon-cross2"></i> Close</button>
						<button type="submit" class="btn bg-cakebox-2"> <i class="icon-floppy-disk"></i> Save</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>    	
@endsection
@section('script')
<script type="text/javascript" src="{{ asset('assets/js/angular/controller/MediaGroupController.js') }}"></script> 
@endsection