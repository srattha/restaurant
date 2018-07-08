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
	}

	.overlay{
		position: absolute;bottom: 0;left: 0;width: 100%;;height: 90px;z-index: 1;background: linear-gradient(transparent, rgba(0, 0, 0, .7));
	}

	.thumb{
		height: 235px;
		background-repeat: no-repeat;
    	background-position: center;
    	background-size: cover;
	}

	.delBtn {
		opacity: 0;
		transition: opacity .15s ease;
		position: absolute;
		top: 0;
		right: 0;
		z-index: 1;
		border: 1px solid rgba(0, 0, 0, .35);
		background-color: #fff;
		color:#222;
		z-index: 8;
	}

	.delBtn:active {
		background-color: #eee;
	}

	.thumbnail:hover .delBtn {
		opacity: 1;
	}

	.thumbnail .caption{
		padding-bottom: 5px;
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

	.text-white{
		color:#fff;
	}
</style>
<script type="text/javascript">
	var media_group = <?php echo $media_group ?>;
</script>
@endsection
@section('content')
<div ng-controller="MediaController"> 
	<div class="panel-heading bg-primary">
		<h1 class="panel-title text-semibold">Media @{{media_group.name}}</h1>
		<div class="heading-elements">
			<a class="btn bg-slate-800" href="/media_group"><i class="icon-arrow-left12" aria-hidden="true"></i>  Back</a>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-md-12">
			<ul class="nav nav-tabs">
				<li class="active"><a data-toggle="tab" href="#home">Add Image </a></li>
				<li><a data-toggle="tab" href="#menu1">Add Video</a></li>
			</ul>
		</div>

		<div class="tab-content">
			<div id="home" class="tab-pane fade in active">
				<div class="col-lg-3 col-sm-6">
					<div class="thumbnail" ng-click="chooseImage()">
						<div class="cover-box">
							<span>Add Image</span>
						</div>
					</div>
					<form name="formImage">
						<input type="file" name="image[]" id="image" class="hidden" multiple accept="image/*">
					</form>
				</div>
				<div class="col-lg-3 col-sm-6" ng-repeat="x in lists" ng-if="x.type =='image'">
					<div class="thumbnail">
						<div class="thumb" style="background-image: url('@{{MEDIA_PATH + '/' + media_group.name + '/' + x.cover | viewURL}}');">
							<a href="@{{MEDIA_PATH + '/' + media_group.name + '/' + x.name | viewURL}}" class="fancybox-image" data-popup="lightbox-video" rel="image"><div style="width: 100%;height: 100%;"></div></a>
							<button class="delBtn" ng-click="delete(x.id)"><i class="icon-trash"></i></button>
						</div>
					</div>
				</div>
			</div>
			<div id="menu1" class="tab-pane fade">
				<div class="col-lg-3 col-sm-6">
					<div class="thumbnail" ng-click="chooseVideo()">
						<div class="cover-box">
							<span>Add Video</span>
						</div>
					</div>
					<form name="formVideo">
						<input type="file" name="video" id="video" class="hidden" accept="video/*">
					</form>
				</div>
				<div class="col-lg-3 col-sm-6" ng-repeat="x in lists" ng-if="x.type == 'video'">
					<div class="thumbnail">
						<div class="thumb" style="background-image: url('@{{MEDIA_PATH + '/' + media_group.name + '/' + x.cover | viewURL}}');">
							<a href="javascript:void(0)" ng-click="viewVideo(MEDIA_PATH + '/' + media_group.name + '/' + x.name)"><div style="width: 100%;height: 100%;"></div></a>
							<button class="delBtn" ng-click="delete(x.id)"><i class="icon-trash"></i></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="formImage" class="modal fade" data-backdrop="static">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<form name="form" ng-submit="submit()">
					<div class="modal-header bg-cakebox">
						<button type="button" data-dismiss="modal" class="close">×</button>
						<h6 class="modal-title">Add Image</h6>
					</div>
					<div class="modal-body">
						<h1 align="center">Preview Image</h1>
						<div class="col-lg-4 col-sm-6" ng-repeat="x in previewImage">
							<div class="thumbnail">
								<div class="thumb" style="background-image: url('@{{x.url}}');">
									<div class="overlay"></div>
									<div class="caption">
										<div class="row">
											<h6 class="no-margin one-line">
												@{{x.name}}
											</h6>
										</div>
										<div class="row">
											<span class="pull-left">Size @{{x.size | bytesToSize}}</span>
											<i class="icon-image2 text-white pull-right"></i>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="modal-footer">
						<button type="button" data-dismiss="modal" class="btn btn-link"> <i class="icon-cross2"></i> Close</button>
						<button type="submit" class="btn bg-cakebox-2"> <i class="icon-floppy-disk"></i> Save</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<div id="formVideo" class="modal fade">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<form name="form" ng-submit="submitvideo()">
					<div class="modal-header bg-cakebox">
						<button type="button" data-dismiss="modal" class="close">×</button>
						<h6 class="modal-title">Add Video</h6>
					</div>
					<div class="modal-body">
						<h1 align="center">Preview Video</h1>
						<div class="col-lg-12 col-sm-12" ng-repeat="x in previewVideo">
							<div class="thumbnail">
								<video id="videoPreview" controls style="width: 100%;height: auto;">
									<source src="@{{x.url | viewURL}}" type="@{{x.type}}">
								</video>
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="modal-footer">
						<button type="button" data-dismiss="modal" class="btn btn-link"> <i class="icon-cross2"></i> Close</button>
						<button type="submit" class="btn bg-cakebox-2"> <i class="icon-floppy-disk"></i> Save</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- Modal Video -->
    <div id="viewVideo" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                	<div id="video-container"></div>
                </div>
            </div>
        </div>
    </div>
    
    
</div>

@endsection
@section('script')
<script type="text/javascript" src="{{ asset('assets/js/angular/controller/MediaController.js') }}"></script>
<script type="text/javascript" src="assets/js/plugins/uploaders/fileinput.min.js"></script>
<script type="text/javascript" src="assets/js/pages/uploader_bootstrap.js"></script>
<script type="text/javascript">
	$('[data-popup="lightbox"]').fancybox({
		padding: 2
	});
</script>
@endsection