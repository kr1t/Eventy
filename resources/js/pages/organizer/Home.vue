<template>
	<div>
		<menu-user/>
		<div class="content-menuUser">
			<div class="card p-3">
				<h2><span>โปรไฟล์</span></h2>
				<div class="row align-items-center">
					<div class="col-12 col-lg-6 text-center text-lg-right">
						<div class="imgProfile">
							<img src="/user/01.svg">
						</div>
					</div>
					<div class="col-12 col-lg-6 mt-3 mt-lg-0">
						<input type="text" id="user" class="form-control mw-240 mx-auto mx-lg-0" v-model="profile.user">
					</div>
				</div>
				<div class="row mt-4">
					<div class="col-12">
						<h4>ข้อมูลส่วนตัว</h4>
					</div>
					<div class="col-12 col-lg-6">
						<div class="form-group">
				          	<label for="name"><p class="mb-0">ชื่อ</p></label>
				          	<input
					            type="text"
					            class="form-control"
					            id="name"
					            placeholder="name"
					            v-model="profile.name"
				          	/>
				        </div>
					</div>
					<div class="col-12 col-lg-6">
						<div class="form-group">
				          	<label for="surname"><p class="mb-0">นามสกุล</p></label>
				          	<input
					            type="text"
					            class="form-control"
					            id="surname"
					            placeholder="surname"
					            v-model="profile.surname"
				          	/>
				        </div>
					</div>
					<div class="col-12 col-lg-6">
						<div class="form-group">
				          	<label for="phone1"><p class="mb-0">เบอร์โทรศัพท์หลัก</p></label>
				          	<input
					            type="text"
					            class="form-control"
					            id="phone1"
					            placeholder="เบอร์โทรศัพท์"
					            v-model="profile.phone1"
				          	/>
				        </div>
					</div>
					<div class="col-12 col-lg-6">
						<div class="form-group">
				          	<label for="phone2"><p class="mb-0">เบอร์โทรศัพท์ ( สำรอง )</p></label>
				          	<input
					            type="text"
					            class="form-control"
					            id="phone2"
					            placeholder="เบอร์โทรศัพท์"
					            v-model="profile.phone2"
				          	/>
				        </div>
					</div>
					<div class="col-12 col-lg-6">
						<div class="form-group">
				          	<label for="email"><p class="mb-0">อีเมล</p></label>
				          	<input
					            type="text"
					            class="form-control"
					            id="email"
					            placeholder="อีเมล"
					            v-model="profile.email"
				          	/>
				        </div>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<hr class="bg-main">
					</div>
				</div>
				<div class="row mt-4">
					<div class="col-12">
						<h4>ช่องทางการติดต่อ</h4>
					</div>
					<div class="col-12 col-lg-6">
						<div class="form-group">
				          	<label for="fb"><p class="mb-0">FACEBOOK</p></label>
				          	<input
					            type="text"
					            class="form-control"
					            id="fb"
					            placeholder="FACEBOOK"
					            v-model="profile.fb"
				          	/>
				        </div>
					</div>
					<div class="col-12 col-lg-6">
						<div class="form-group">
				          	<label for="tw"><p class="mb-0">TWITTER</p></label>
				          	<input
					            type="text"
					            class="form-control"
					            id="tw"
					            placeholder="TWITTER"
					            v-model="profile.tw"
				          	/>
				        </div>
					</div>
					<div class="col-12 col-lg-6">
						<div class="form-group">
				          	<label for="ig"><p class="mb-0">INSTAGRAM</p></label>
				          	<input
					            type="text"
					            class="form-control"
					            id="ig"
					            placeholder="INSTAGRAM"
					            v-model="profile.ig"
				          	/>
				        </div>
					</div>
					<div class="col-12 col-lg-6">
						<div class="form-group">
				          	<label for="yt"><p class="mb-0">YOUTUBE</p></label>
				          	<input
					            type="text"
					            class="form-control"
					            id="yt"
					            placeholder="YOUTUBE"
					            v-model="profile.yt"
				          	/>
				        </div>
					</div>
					<div class="col-12 col-lg-6">
						<div class="form-group">
				          	<label for="ln"><p class="mb-0">LINE</p></label>
				          	<input
					            type="text"
					            class="form-control"
					            id="ln"
					            placeholder="LINE"
					            v-model="profile.ln"
				          	/>
				        </div>
					</div>
					<div class="col-12 col-lg-6">
						<div class="form-group">
				          	<label for="ws"><p class="mb-0">WEBSITE</p></label>
				          	<input
					            type="text"
					            class="form-control"
					            id="ws"
					            placeholder="WEBSITE"
					            v-model="profile.ws"
				          	/>
				        </div>
					</div>
				</div>
				<div class="row mt-4">
					<!-- <div class="col-12"> -->
						<button class="btn btn-outline-main mx-auto px-4">บันทึก</button>
					<!-- </div> -->
				</div>
			</div>
		</div>
	</div>
</template>
<script>
	import MenuUser from "~/components/MenuUser.vue";
	export default {
		data:function(){
			return{
				profile:{
					user : '@dominiccjj',
					name : 'ม่านฟ้า',
					surname : 'เรืองเดช',
					phone1 : '0123456789',
					phone2 : '0123456781',
					email : 'dominiccjj@gmail.com',
					fb : '',
					tw : '@dominiccjj',
					ig : '@dominiccjj',
					yt : '',
					ln : '',
					ws : 'www.dominiccjj.com',
				}
			}
		},
	  	components: {
	  		MenuUser,
	  	}
	};
</script>
<style type="text/css" scoped>

	.imgProfile img{
		width: 120px;
	}
	.mw-240{
		max-width: 240px;
	}
	@media (min-width: 992px){
		.imgProfile img{
			width: 160px;
		}
	}
</style>
