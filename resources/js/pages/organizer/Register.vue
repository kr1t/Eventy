<template>
	<div>
		<menu-user/>
		<div class="content-menuUser">
			<div class="card p-3">
				<h2><span>สมัครเป็นผู้จัดงาน</span></h2>
				<div class="row align-items-center">
					<div class="col-12 col-lg-6 text-center text-lg-right">
						<div class="imgProfile">
							<img src="/user/01.svg">
						</div>
					</div>
					<div class="col-12 col-lg-6 text-left">
						<div class="form-group">
				          	<label for="name"><p class="mb-0">ชื่อผู้จัดงาน</p></label>
				          	<input
					            type="text"
					            class="form-control"
					            id="name"
					            placeholder="name"
					            v-model="organizer.name"
				          	/>
				        </div>
					</div>
				</div>
				<div class="row mt-4">
					<!-- <div class="col-12"> -->
						<button class="btn btn-outline-main mx-auto px-4" v-on:click="register">เปิดใช้งาน</button>
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
				organizer :{
					id : 0,
					name : '',
					logo : '',
					type : 'organizer',
				}
			}
		},
	  	components: {
	  		MenuUser,
	  	},
	  	methods :{
	  		register(event) {
		      	let _this = this;
		      	let urlApi = this.appConfig.$api_url+"/api/organizer/register";
		      	event.target.disabled = true;
		      	fetch(urlApi, {
		        	method: "POST",
		        	cache: "no-cache",
		        	headers: {
		          		"Content-Type": "application/json; charset=UTF-8"
		        	},
		        	body: JSON.stringify(_this.organizer)
		      	})
		        .then(function(response) {
		          	event.target.disabled = false;
		          	if(response.status != 200){
		            	alert('เกิดข้อผิดพลาด Code:'+response.status);
		          	}
		          	return response.json();
		        })
		        .then(function(data) {
		          	if(data.status=='success'){

						console.log("status", data.status);
		          	}else{
		            	alert('รหัสผ่าน หรือชื่อผู้ใช้งานไม่ถูกต้อง');
		          	}
		        })
		        .catch(function(error) {
		          	console.log(error);
		        });
		    }
	  	},
	  	mounted: function() {
		    let _this = this;
		    setInterval(function(){
		      if (_this.$session.get("user_id")) {
		        _this.organizer.id = _this.$session.get("user_id");
		      }
		    },500);
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
