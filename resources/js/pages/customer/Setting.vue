<template>
	<div>
		<menu-user/>
		<div class="content-menuUser">
			<div class="card p-3">
				<h2><span>การตั้งค่า</span></h2>
				<div class="row mt-4">
					<div class="col-12">
						<h4>รหัสผ่าน</h4>
					</div>
					<div class="col-12 col-lg-6">
						<div class="form-group">
				          	<label for="password"><p class="mb-0">รหัสผ่านปัจจุบัน</p></label>
				          	<input
					            type="password"
					            class="form-control"
					            id="password"
					            placeholder="รหัสผ่านปัจจุบัน"
					            v-model="profile.password"
				          	/>
				        </div>
					</div>
				</div>
				<div class="row">
					<div class="col-12 col-lg-6">
						<div class="form-group">
				          	<label for="passwordNew"><p class="mb-0">รหัสผ่านใหม่</p></label>
				          	<input
					            type="password"
					            class="form-control"
					            id="passwordNew"
					            placeholder="รหัสผ่านใหม่"
					            v-model="profile.passwordNew"
				          	/>
				        </div>
					</div>
					<div class="col-12 col-lg-6">
						<div class="form-group">
				          	<label for="passwordConfirm"><p class="mb-0">ยืนยันรหัสใหม่</p></label>
				          	<input
					            type="password"
					            class="form-control"
					            id="passwordConfirm"
					            placeholder="เบอร์โทรศัพท์"
					            v-model="profile.passwordConfirm"
				          	/>
				        </div>
					</div>
				</div>

				<div class="row mt-4">
					<!-- <div class="col-12"> -->
						<button class="btn btn-outline-main mx-auto px-4">บันทึก</button>
					<!-- </div> -->
				</div>
				<div class="row">
					<div class="col-12">
						<hr class="bg-main">
					</div>
				</div>
				<div class="row mt-4">
					<div class="col-12">
						<h4>ร้านค้า</h4>
					</div>
					<div class="col-12 d-flex align-items-center justify-content-between w-100 py-2 flex-column flex-lg-row">
						<div class="d-flex flex-fill">
							<div class="mr-3">
								<img :src="store.image" width="100">
							</div>
							<div>
								<p class="mb-0">{{ store.title }}</p>
								<p><small>{{ store.des }}</small></p>
							</div>
						</div>
						<div>
							<button class="btn btn-sm btn-outline-main"><small>ตั้งค่า</small></button>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<hr class="bg-main">
					</div>
				</div>
				<div class="row mt-4">
					<div class="col-12 d-flex justify-content-between align-items-center">
						<h4>ผู้จัดงาน</h4>

						<div>
							<router-link to="/organizer/register" class="btn btn-sm btn-main"><small>สมัครใช้งาน</small></router-link>
						</div>
					</div>
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
					password : '',
					passwordNew : '',
					passwordConfirm : '',
				},
				store:{
					image : '/user/07.svg',
					title : 'NctBacktoschool2020',
					des : 'ร้านค้า Fan art มากมาย, สติกเกอร์',
				}
			}
		},
	  	components: {
	  		MenuUser,
	  	}
	};
</script>
