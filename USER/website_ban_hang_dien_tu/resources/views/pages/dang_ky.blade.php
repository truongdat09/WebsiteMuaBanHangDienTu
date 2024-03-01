@extends('layout')
@section('content')
<!-- SECTION -->
<style>
	

</style>
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<!-- Order Details -->
			<div class="col-md-5">
				<div>
					<img src="{{asset('public/frontend/img/dangky.png')}}" alt="">
				</div>
				<div class="form-group">
					<header disabled id="header" style="text-align: center; background-color:antiquewhite;">VUI LÒNG NHẬP MÃ XÁC THỰC NGƯỜI DÙNG.</header>
					<div class="captcha-area">
						<div class="captcha-img">Mã: 
							<b style="font-size:20px;" class="captcha"></b>
							<button style="border: none; color:red;" class="reload-btn"><i class="fa fa-refresh"></i></button>
						</div>
						
					</div>
					<form action="#" class="input-area">
						<input class="input" type="text" placeholder="Nhập mã" maxlength="6" spellcheck="false" required">
						<br>
						<button class="check-btn btn-block">Kiểm tra</button>
					</form>
					<div class="status-text"></div>
				</div>
				<form action="{{URL::to('/them-khach-hang')}}" method="post">
					@csrf
					<button style="display: none;" disabled id="btn_DangKy" class="primary-btn btn-block" type="submit">ĐĂNG KÝ</button>
					
					<div class="card-footer text-center">
						<p class="mb-0">Bạn đã có tài khoản? <a href="{{URL::to('/dang-nhap')}}">Đăng nhập ngay</a></p>
					</div>
			</div>
			<!-- /Order Details -->
			<div class="col-md-7">
				<!-- Billing Details -->
				<div class="billing-details">
					<div class="section-title">
						<h3 class="title">THÔNG TIN TÀI KHOẢN</h3>
					</div>
					<div class="form-group">
						<i class="fa fa-user-circle-o"></i>&nbsp;<label for="">Họ & tên</label>(<b style="color:red;">*</b>)
						<input id="tenkh" disabled class="input" type="text" name="TEN_KH" placeholder="Nhập họ và tên" autofocus required>
					</div>
					<div class="form-group">
						<i class="fa fa-user"></i>&nbsp;<label for="">Tên đăng nhập</label>(<b style="color:red;">*</b>)
						<input disabled id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Nhập email" name="EMAIL" value="{{ old('email') }}" required autocomplete="email">
					</div>
					<div class="form-group">
						<i class="fa fa-lock"></i>&nbsp;<label for="">Mật khẩu</label>(<b style="color:red;">*</b>)
						<input id="matkhau" disabled class="input" type="password" name="MATKHAU" placeholder="Nhập mật khẩu" required>
					</div>
					<div class="form-group">
						<i class="fa fa-unlock"></i>&nbsp;<label for="">Xác nhận mật khẩu</label>(<b style="color:red;">*</b>)
						<input id="nhaplai" disabled class="input" type="password" name="password" placeholder="Nhập lại mật khẩu" required>
					</div>
					<div class="form-group">
						<i class="fa fa-phone"></i>&nbsp;<label for="">Số điện thoại</label>(<b style="color:red;">*</b>)
						<input id="sdt" disabled class="input" type="tel" name="SDT_KH" placeholder="Số điện thoại" required>
					</div>
					<div class="form-group">
						<i class="fa fa-address-card-o"></i>&nbsp;<label for="">Địa chỉ</label>(<b style="color:red;">*</b>)
						<input id="diachi" disabled class="input" type="text" name="DIACHI" placeholder="Nhập địa chỉ" required>
					</div>
				</div>
				<!-- /Billing Details -->
			</div>
		</div>
		<!-- /row -->
		</form>
	</div>
	<!-- /container -->
</div>
<!-- /SECTION -->
<script>
	const captcha = document.querySelector(".captcha"),
		reloadBtn = document.querySelector(".reload-btn"),
		inputField = document.querySelector(".input-area input"),
		checkBtn = document.querySelector(".check-btn"),
		statusTxt = document.querySelector(".status-text");

	var btnDangKy = document.getElementById('btn_DangKy'),
		tenkh = document.getElementById('tenkh'),
		email = document.getElementById('email'),
		matkhau = document.getElementById('matkhau'),
		nhaplai = document.getElementById('nhaplai'),
		sdt = document.getElementById('sdt'),
		diachi = document.getElementById('diachi');

	var textheader = document.getElementById('header');


	//storing all captcha characters in array
	let allCharacters = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O',
		'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'a', 'b', 'c', 'd',
		'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's',
		't', 'u', 'v', 'w', 'x', 'y', 'z', 0, 1, 2, 3, 4, 5, 6, 7, 8, 9
	];

	function getCaptcha() {
		for (let i = 0; i < 6; i++) { //getting 6 random characters from the array
			let randomCharacter = allCharacters[Math.floor(Math.random() * allCharacters.length)];
			captcha.innerText += ` ${randomCharacter}`; //passing 6 random characters inside captcha innerText
		}
	}
	getCaptcha(); //calling getCaptcha when the page open
	//calling getCaptcha & removeContent on the reload btn click
	reloadBtn.addEventListener("click", () => {
		removeContent();
		getCaptcha();
	});

	checkBtn.addEventListener("click", e => {
		e.preventDefault(); //preventing button from it's default behaviour
		statusTxt.style.display = "block";
		//adding space after each character of user entered values because I've added spaces while generating captcha
		let inputVal = inputField.value.split('').join(' ');
		if (inputVal == captcha.innerText) { //if captcha matched
			statusTxt.style.color = "#4db2ec";
			statusTxt.innerText = "Chúc mừng! Bạn không phải là robot.";
			// setTimeout(()=>{ //calling removeContent & getCaptcha after 4 seconds
			//   removeContent();
			//   getCaptcha();
			// }, 2000);
			btnDangKy.disabled = false;
			tenkh.disabled = false;
			email.disabled = false;
			matkhau.disabled = false;
			nhaplai.disabled = false;
			sdt.disabled = false;
			diachi.disabled = false;
			//header.disabled = false;
			document.getElementById('btn_DangKy').style.display = 'block';
		} else {
			btnDangKy.disabled = true;
			
			tenkh.disabled = true;
			email.disabled = true;
			matkhau.disabled = true;
			nhaplai.disabled = true;
			sdt.disabled = true;
			diachi.disabled = true;
			//header.disabled = true;
			statusTxt.style.color = "#ff0000";
			statusTxt.innerText = "Mã không đúng. Vui lòng thử lại!";
		}
	});

	function removeContent() {
		inputField.value = "";
		captcha.innerText = "";
		statusTxt.style.display = "none";
	}
</script>
@endsection