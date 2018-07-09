<!-- Main sidebar -->
<style type="text/css">
</style>
<div class="sidebar sidebar-main sidebar-fixed">
	<div class="sidebar-content">

		<div class="sidebar-category sidebar-category-visible">
			<div class="category-content no-padding">
				<ul class="navigation navigation-main navigation-accordion">
					<li>
						<a href="/user"><i class="icon-user-lock"></i>จัดการสมาชิก</a>
					</li>

					<li>
						<a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false"><i class="icon-cart5"></i>จัดการเมนูอาหาร</a>
						<ul class="collapse list-unstyled" id="homeSubmenu">
							<li><a href="/all_menus"><i class="icon-file-empty"></i>จัดการเมนูอาการทั้งหมด</a></li>
							<li>
								<a href="/recommended_menu"><i class="icon-file-text2"></i>จัดการเมนูอาหารแนะนำ</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="/media_group"> <i class=" icon-image2"></i>จัดการรูปภาพ</a>
					</li>
					<li>
						<a href="/promotion"><i class=" icon-megaphone"></i>จัดการโปรโมชั่น</a>
					</li>
					<li>
						<a href="/table"><i class=" icon-bed2"></i>จัดการโต๊ะ</a>
					</li>
					<li>
						<a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false"><i class="icon-cart5"></i> แสดงรายงานการ จอง</a>
						<ul class="collapse list-unstyled" id="homeSubmenu">
							<li>
								<a href="/reservations_table"><i class="icon-cart5"></i>รายการจองโต๊ะ</a>
							</li>
							<li><a href="/report"><i class="icon-file-empty"></i>รายงานยอดรวม</a></li>
							<li><a href="#">Home 3</a></li>
						</ul>
					</li>
					
					<li>
						<a href="/promotion"><i class=" icon-megaphone"></i>แสดงรายการ จองโต๊ะ</a>
					</li>

					<li><a href="{{ route('logout') }}" class="legitRipple" onclick="event.preventDefault();
					document.getElementById('logout-form').submit();"><i class="icon-switch2"></i><span>Log out</span></a></li>
					<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
						{{ csrf_field() }}
					</form>
				</ul>	

			</div>
		</div>


	</div>
</div>


<!-- /Main sidebar -->