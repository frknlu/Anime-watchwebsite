<div class="wp-manga-section">
	<input type="hidden" name="bookmarking" value="0">
	<div class="modal fade" id="form-login" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span></button>
				</div>
				<div class="modal-body">
					<div id="login" class="login">
						<h1>
							<a href="" title="MangaBooth Demo" tabindex="-1">GİRİŞ YAP</a>
						</h1>
						<p class="message login"></p>
						<link rel="dns-prefetch" href="//fonts.googleapis.com">
<script type="text/javascript" src="css/wp-embed.min.js?ver=4.9.6"></script>

						<form name="loginform" id="loginform" action="login.php" method="post">
							<p>
								<label>Kullanıcı adı veya Eposta									<br>
									<input type="text" name="log" class="input user_login" value="" size="20" required>
								</label>
							</p>
							<p>
								<label>Parola *									<br>
									<input type="password" name="pwd" class="input user_pass" value="" size="20" required>
								</label>
							</p>
							<p class="forgetmenot">
								<label>
									<input name="rememberme" type="checkbox" id="rememberme" value="forever">Beni Hatırla
								</label>
							</p>
							<p class="submit">
								<input type="submit" name="wp-submit" class="button button-primary button-large wp-submit" value="Giriş Yap">
							</p>
							</form>
							
						<p class="nav">
							<a href="javascript:avoid(0)" class="to-reset">Şifremi Unuttum?</a>
						</p>
						<p class="backtoblog">
							<a href="javascript:void(0)">← Kapat</a>
						</p>
					</div>
				</div>
				<div class="modal-footer"></div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="form-sign-up" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span></button>
				</div>
				<div class="modal-body">
					<div id="sign-up" class="login">
						<h1>
							<a href="" title="" tabindex="-1">Giriş Yap</a>
						</h1>
						<p class="message register">KAYIT OL</p>
						<link rel="dns-prefetch" href="//fonts.googleapis.com">
						<form name="registerform" id="registerform" action="register.php" method="post">
							<p>
								<label>Kullanıcı Adı (Nickname) *									
								<br>
									<input type="text" name="kullaniciadi" class="input user_login" value="" size="20" required>
								</label>
							</p>
							<p>
								<label>E-posta *									<br>
									<input type="email" name="email" class="input user_email" value="" size="20" required>
								</label>
							</p>
							<p>
								<label>Parola *<br>
									<input type="password" name="parola" class="input user_pass" value="" size="25" required>
								</label>
							</p>

							<input type="hidden" name="redirect_to" value="">
							<p class="submit">
								<input type="submit" name="wp-submit" class="button button-primary button-large wp-submit" value="Kayıt Ol">
							</p>
						</form>
							<p class="nav">
							<a href="javascript:void(0)" class="to-login">Giriş Yap</a>
							|
							<a href="javascript:void(0)" class="to-reset">Şifremi Unuttum ?</a>
						</p>
						<p class="backtoblog">
							<a href="javascript:void(0)">← Kapat</a>
						</p>
					</div>
				</div>
				<div class="modal-footer"></div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="form-reset" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span></button>
				</div>
				<div class="modal-body">
					<div id="reset" class="login">
						<h1>
							<a href="javascript:void(0)" class="to-reset">Şifrenizimi unuttunuz?</a>
						</h1>
						<p class="message reset">Lütfen kullanıcı adı veya email giriniz.E-postanıza gelen mail ile yeni şifrenizi oluşturabilirsiniz.</p>
						<form name="resetform" id="resetform" method="post">
							<p>
								<label>Kullanıcı adı veya Email									<br>
									<input type="text" name="user_reset" id="user_reset" class="input" value="" size="20">
								</label>
							</p>
							<p class="submit">
								<input type="submit" name="wp-submit" class="button button-primary button-large wp-submit" value="Gönder">
							</p>
						</form>
						<p>
							<a class="backtoblog" href="javascript:void(0)">← Kapat</a>
						</p>
					</div>
				</div>
				<div class="modal-footer"></div>
			</div>
		</div>
	</div>
</div>