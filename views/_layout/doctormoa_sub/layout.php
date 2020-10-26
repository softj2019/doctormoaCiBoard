<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, minimum-scale=1, user-scalable=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo html_escape(element('page_title', $layout)); ?></title>
    <?php if (element('meta_description', $layout)) { ?><meta name="description" content="<?php echo html_escape(element('meta_description', $layout)); ?>"><?php } ?>
    <?php if (element('meta_keywords', $layout)) { ?><meta name="keywords" content="<?php echo html_escape(element('meta_keywords', $layout)); ?>"><?php } ?>
    <?php if (element('meta_author', $layout)) { ?><meta name="author" content="<?php echo html_escape(element('meta_author', $layout)); ?>"><?php } ?>
    <?php if (element('favicon', $layout)) { ?><link rel="shortcut icon" type="image/x-icon" href="<?php echo element('favicon', $layout); ?>" /><?php } ?>
    <?php if (element('canonical', $view)) { ?><link rel="canonical" href="<?php echo element('canonical', $view); ?>" /><?php } ?>
    <!-- Font Awesome Icons -->
<!--    <link rel="stylesheet" href="--><?php //echo element('layout_skin_url', $layout); ?><!--/assets/plugins/fontawesome-free/css/all.min.css">-->
    <link href="<?php echo element('layout_skin_url', $layout); ?>/assets/css/reset.css" rel="stylesheet" type="text/css">
    <link href="<?php echo element('layout_skin_url', $layout); ?>/assets/css/common.css" rel="stylesheet" type="text/css">
    <link href="<?php echo element('layout_skin_url', $layout); ?>/assets/css/system.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+KR:300,400&display=swap&subset=korean" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.3.0/fonts/remixicon.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" rel="stylesheet" type="text/css">
    <link href="<?php echo element('layout_skin_url', $layout); ?>/assets/plugins/slick-theme.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/ui-lightness/jquery-ui.css" />-->
    <?php echo $this->managelayout->display_css(); ?>

    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote-lite.min.js"></script>
    <script type="text/javascript">
    // 자바스크립트에서 사용하는 전역변수 선언
    var cb_url = "<?php echo trim(site_url(), '/'); ?>";
    var cb_cookie_domain = "<?php echo config_item('cookie_domain'); ?>";
    var cb_charset = "<?php echo config_item('charset'); ?>";
    var cb_time_ymd = "<?php echo cdate('Y-m-d'); ?>";
    var cb_time_ymdhis = "<?php echo cdate('Y-m-d H:i:s'); ?>";
    var layout_skin_path = "<?php echo element('layout_skin_path', $layout); ?>";
    var view_skin_path = "<?php echo element('view_skin_path', $layout); ?>";
    var is_member = "<?php echo $this->member->is_member() ? '1' : ''; ?>";
    var is_admin = "<?php echo $this->member->is_admin(); ?>";
    var cb_admin_url = <?php echo $this->member->is_admin() === 'super' ? 'cb_url + "/' . config_item('uri_segment_admin') . '"' : '""'; ?>;
    var cb_board = "<?php echo isset($view) ? element('board_key', $view) : ''; ?>";
    var cb_board_url = <?php echo ( isset($view) && element('board_key', $view)) ? 'cb_url + "/' . config_item('uri_segment_board') . '/' . element('board_key', $view) . '"' : '""'; ?>;
    var cb_device_type = "<?php echo $this->cbconfig->get_device_type() === 'mobile' ? 'mobile' : 'desktop' ?>";
    var cb_csrf_hash = "<?php echo $this->security->get_csrf_hash(); ?>";
    var cookie_prefix = "<?php echo config_item('cookie_prefix'); ?>";
    </script>
    <!--[if lt IE 9]>
    <script type="text/javascript" src="<?php echo base_url('assets/js/html5shiv.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/respond.min.js'); ?>"></script>
    <![endif]-->
    <script type="text/javascript" src="<?php echo base_url('assets/js/common.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.validate.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.validate.extension.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/sideview.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/js.cookie.js'); ?>"></script>
    <?php echo $this->managelayout->display_js(); ?>
</head>
<body <?php echo isset($view) ? element('body_script', $view) : ''; ?>>
<div class="wrap fo-wrap">

	<!-- header start -->
	<header class="header hidden">
		<div class="container">
			<ul class="header-top-menu">
				<?php if ($this->member->is_admin() === 'super') { ?>
					<li><i class="fa fa-cog"></i><a href="<?php echo site_url(config_item('uri_segment_admin')); ?>" title="관리자 페이지로 이동">관리자</a></li>
				<?php } ?>
				<?php
				if ($this->member->is_member()) {
					if ($this->cbconfig->item('use_notification')) {
				?>
					<li class="notifications"><i class="fa fa-bell-o"></i>알림 <span class="badge notification_num"><?php echo number_format((int) element('notification_num', $layout)); ?></span>
						<div class="notifications-menu"></div>
					</li>
					<script type="text/javascript">
					//<![CDATA[
					$(document).mouseup(function (e)
					{
						var noticontainer = $('.notifications-menu');

						if ( ! noticontainer.is(e.target) // if the target of the click isn't the container...
							&& noticontainer.has(e.target).length === 0) // ... nor a descendant of the container
						{
							noticontainer.hide();
						}
					});
					//]]>
					</script>
				<?php
					}
				?>
					<li><i class="fa fa-sign-out"></i><a href="<?php echo site_url('login/logout?url=' . urlencode(current_full_url())); ?>" title="로그아웃">로그아웃</a></li>
					<li><i class="fa fa-user"></i><a href="<?php echo site_url('mypage'); ?>" title="마이페이지">마이페이지</a></li>
				<?php } else { ?>
					<li><i class="fa fa-sign-in"></i><a href="<?php echo site_url('login?url=' . urlencode(current_full_url())); ?>" title="로그인">로그인</a></li>
					<li><i class="fa fa-user"></i><a href="<?php echo site_url('register'); ?>" title="회원가입">회원가입</a></li>
				<?php } ?>
				<?php if ($this->cbconfig->item('open_currentvisitor')) { ?>
					<li><i class="fa fa-link"></i><a href="<?php echo site_url('currentvisitor'); ?>" title="현재접속자">현재접속자</a> <span class="badge"><?php echo element('current_visitor_num', $layout); ?></span></li>
				<?php } ?>
			</ul>
		</div>
	</header>
	<!-- header end -->

	<!-- nav start -->
	<nav class="navbar hidden">
		<div class="container">
			<div class="logo pull-left">
				<a href="<?php echo site_url(); ?>" title="<?php echo html_escape($this->cbconfig->item('site_title'));?>"><?php echo $this->cbconfig->item('site_logo'); ?></a>
			</div>
			<ul class="menu pull-right">
				<?php
				$menuhtml = '';
				if (element('menu', $layout)) {
					$menu = element('menu', $layout);
					if (element(0, $menu)) {
						foreach (element(0, $menu) as $mkey => $mval) {
							if (element(element('men_id', $mval), $menu)) {
								$mlink = element('men_link', $mval) ? element('men_link', $mval) : 'javascript:;';
								$menuhtml .= '<li class="dropdown">
								<a href="' . $mlink . '" ' . element('men_custom', $mval);
								if (element('men_target', $mval)) {
									$menuhtml .= ' target="' . element('men_target', $mval) . '"';
								}
								$menuhtml .= ' title="' . html_escape(element('men_name', $mval)) . '">' . html_escape(element('men_name', $mval)) . '</a>
								<ul class="dropdown-menu">';

								foreach (element(element('men_id', $mval), $menu) as $skey => $sval) {
									$slink = element('men_link', $sval) ? element('men_link', $sval) : 'javascript:;';
									$menuhtml .= '<li><a href="' . $slink . '" ' . element('men_custom', $sval);
									if (element('men_target', $sval)) {
										$menuhtml .= ' target="' . element('men_target', $sval) . '"';
									}
									$menuhtml .= ' title="' . html_escape(element('men_name', $sval)) . '">' . html_escape(element('men_name', $sval)) . '</a></li>';
								}
								$menuhtml .= '</ul></li>';

							} else {
								$mlink = element('men_link', $mval) ? element('men_link', $mval) : 'javascript:;';
								$menuhtml .= '<li><a href="' . $mlink . '" ' . element('men_custom', $mval);
								if (element('men_target', $mval)) {
									$menuhtml .= ' target="' . element('men_target', $mval) . '"';
								}
								$menuhtml .= ' title="' . html_escape(element('men_name', $mval)) . '">' . html_escape(element('men_name', $mval)) . '</a></li>';
							}
						}
					}
				}
				echo $menuhtml;
				?>
				<li>
					<form name="header_search" id="header_search" action="<?php echo site_url('search'); ?>" onSubmit="return headerSearch(this);">
						<input type="text" placeholder="Search" class="input" name="skeyword" accesskey="s" />
						<button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
					</form>
					<script type="text/javascript">
					//<![CDATA[
					$(function() {
						$('.dropdown').hover(function() {
							$(this).addClass('open');
						}, function() {
							$(this).removeClass('open');
						});
					});
					function headerSearch(f) {
						var skeyword = f.skeyword.value.replace(/(^\s*)|(\s*$)/g,'');
						if (skeyword.length < 2) {
							alert('2글자 이상으로 검색해 주세요');
							f.skeyword.focus();
							return false;
						}
						return true;
					}
					//]]>
					</script>
				</li>
			</ul>
		</div>
	</nav>
	<!-- nav end -->

    <div class="right-tab">
        <div class="tab-hd flexwrap">
            <button type="button" class="closebox"></button>
            <ul class="main-tab-ul flexcenter">
                <li>
                <?php if ($this->member->is_admin() === 'super') { ?>
                    <i class="fa fa-cog"></i><a href="<?php echo site_url(config_item('uri_segment_admin')); ?>" title="관리자 페이지로 이동">관리자</a>
                <?php } ?>
                <?php
                if ($this->member->is_member()) {
                ?>
                    &nbsp;|&nbsp; <a href="<?php echo site_url('login/logout?url=' . urlencode(current_full_url())); ?>">로그아웃</a>
                <?php
                }else{
                    ?>
                    <a href="<?php echo site_url('login?url=' . urlencode(current_full_url())); ?>">로그인</a>
                    &nbsp;|&nbsp;<a href="<?php echo site_url('register'); ?>">회원가입</a>
                    <?php
                }
                ?>
                </li>
            </ul>
        </div>
        <ul class="tab-lo">
            <?php
            if ($this->member->is_member()) {
            ?>
                <li><a href="">마이페이지</a></li>
            <?php }?>
            <li><a href="">진료선택</a></li>
            <li><a href="">방문후기</a></li>
            <li><a href="">자유게시판</a></li>
            <li><a href="">질문과 답변</a></li>
            <li><a href="">제품판매</a></li>
            <li><a href="">구인구직</a></li>
            <li><a href="">공지사항</a></li>
            <li><a href="">의사/병원 등록하기</a></li>
        </ul>

    </div>


    <!-- 본문 시작 -->
    <?php if (isset($yield))echo $yield; ?>
    <!-- 본문 끝 -->



    <!-- main start -->
	<div class="main hidden">
		<div class="container">
			<?php if (element('use_sidebar', $layout)) {?>
				<div class="left">
			<?php } ?>

			<!-- 본문 시작 -->
			<?php if (isset($yield))echo $yield; ?>
			<!-- 본문 끝 -->

			<?php if (element('use_sidebar', $layout)) {?>

				</div>
				<div class="sidebar">
					<?php $this->load->view(element('layout_skin_path', $layout) . '/sidebar'); ?>
				</div>

			<?php } ?>

		</div>
	</div>
	<!-- main end -->
    <div class="modal" id="ham-mo">
        <div class="modal-bg"></div>
        <div class="modalContent md ham-con">
            <header class="modalHd">
                <h3>더보기</h3>
                <button class="modalClose"></button>
            </header>
            <div class="modalBody pt0 ham-body">
                <ul class="cont-ul">
                    <li><a href="">방문후기</a></li>
                    <li><a href="">자유게시판</a></li>
                    <li><a href="">질문과 답변</a></li>
                    <li><a href="">제품판매</a></li>
                    <li><a href="">구인구직</a></li>
                    <li><a href="">공지사항</a></li>
                    <li><a href="">의사/병원 등록하기</a></li>
                </ul>
            </div>
        </div>
    </div>

	<!-- footer end -->
    <nav class="f-nav">
        <ul class="flexwrap">
            <li class=""><a href=""><i class="ham-i"></i></a></li>
            <li><a href=""><i class="location-i"></i></a></li>
            <li><a href=""><i class="search-i"></i></a></li>
            <li><a href="/"><i class="home-i"></i></a></li>
            <li><a id="mobileMyPage"><i class="mypage-i"></i></a></li>
        </ul>
    </nav>
</div>
<script type="text/javascript" src="<?php echo element('layout_skin_url', $layout); ?>/assets/plugins/moment/moment.min.js"></script>
<script type="text/javascript" src="<?php echo element('layout_skin_url', $layout); ?>/assets/plugins/moment/locale/ko.js"></script>
<script type="text/javascript" src="<?php echo element('layout_skin_url', $layout); ?>/assets/plugins/daterangepicker/daterangepicker.js"></script>
<script src="<?php echo element('layout_skin_url', $layout); ?>/assets/js/common.js"></script>
<script src="<?php echo element('layout_skin_url', $layout); ?>/assets/js/system.js"></script>
<script type="text/javascript">
$(document).on('click', '.viewpcversion', function(){
	Cookies.set('device_view_type', 'desktop', { expires: 1 });
});
$(document).on('click', '.viewmobileversion', function(){
	Cookies.set('device_view_type', 'mobile', { expires: 1 });
});
$('#mobileMyPage').click(function () {
    var login_url = "<?php echo site_url('login?url=' . urlencode(current_full_url())); ?>";
    var mypage_url= "<?php echo site_url('mypage'); ?>";
    if(is_member==="1"){
        location.href=mypage_url;
    }else{
        location.href=login_url;
    }
})
</script>
<?php echo element('popup', $layout); ?>
<?php echo $this->cbconfig->item('footer_script'); ?>

<!--
Layout Directory : <?php echo element('layout_skin_path', $layout); ?>,
Layout URL : <?php echo element('layout_skin_url', $layout); ?>,
Skin Directory : <?php echo element('view_skin_path', $layout); ?>,
Skin URL : <?php echo element('view_skin_url', $layout); ?>,
-->

</body>
</html>
