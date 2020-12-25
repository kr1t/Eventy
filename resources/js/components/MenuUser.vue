<template>
	<div class="menuLeft" :class="{ active : active == true }">
		<div class="menuLeftIcon" :class="{ active : active == true }" @click="menuActive()">
			<div class="line"></div>
			<div class="line"></div>
			<div class="line"></div>
		</div>
		<div class="menuLeftBox">
			<div>
				<!-- <img src=""> -->
			</div>
			<ul>
				<router-link exact to="/profile">
					<li>
						<img src="/assets/icon/profile.svg"> <h6>ข้อมูลส่วนตัว</h6>
					</li>
				</router-link>
				<router-link exact to="/profile/ticket">
					<li>
						<img src="/assets/icon/ticket.svg"> <h6>ตั๋วของฉัน</h6>
					</li>
				</router-link>
				<router-link exact to="/profile/notification">
					<li>
						<img src="/assets/icon/notification-bit.svg"> <h6>การแจ้งเตือน</h6>
					</li>
				</router-link>
				<router-link exact to="/profile/preorder" >
					<li>
						<img src="/assets/icon/preorder.svg"> <h6>สินค้าพรีออเดอร์</h6>
					</li>
				</router-link>
				<router-link exact to="/profile/setting">
					<li>
						<img src="/assets/icon/setting.svg"> <h6>การตั้งค่า</h6>
					</li>
				</router-link>
				<router-link to="/logout">
					<li>
						<img src="/assets/icon/setting.svg"> <h6>ออกจากระบบ</h6>
					</li>
				</router-link>
			</ul>
		</div>
	</div>
</template>
<script>
	export default {
	  	data: function() {
	    	return {
	    		active : false,
	    	};
	  	},
	  	methods:{
	  		menuActive:function(){
	  			this.active = !this.active;
	  		}
	  	}

	};
</script>
<style type="text/css" scoped>
	.menuLeft{
		position: fixed;
		left: 0px;
		top: 0;
		bottom: 54px;
		width: 60px;
		background-color: #fff;
		box-shadow: 0 0 10px 1px rgba(0,0,0,0.2);
		transition: .5s ease-in-out;
		z-index: 1000;
		height: calc(100vh - 54px);
	}
	.menuLeft.active{
		left: 0;
		width: 260px;
	}
	.menuLeft .menuLeftIcon{
		position: absolute;
		right: 0;
		top: 50%;
		width: 40px;
		height: 40px;
		background: #fff;
		box-shadow: 0 0 10px 1px rgba(0,0,0,0.2);
		transform: translate(50%,-50%);
		border-radius: 100%;
		z-index: 1020;
	}
	.menuLeft .menuLeftIcon .line{
		width: 16px;
		height: 3px;
		background-color: var(--color-main);
		position: absolute;
		left: 50%;
		top: 50%;
		transition: .5s;
	}
	.menuLeft .menuLeftIcon .line:nth-child(1){
		transform: translateX(-50%) translateY(calc(-50% - 5px));
	}
	.menuLeft .menuLeftIcon .line:nth-child(2){
		transform: translateX(-50%) translateY(-50%);
	}
	.menuLeft .menuLeftIcon .line:nth-child(3){
		transform: translateX(-50%) translateY(calc(-50% + 5px));
	}
	.menuLeft .menuLeftIcon.active .line:nth-child(1){
		transform: translateX(-50%) translateY(calc(-50% - 3.5px)) rotate(150deg);
	}
	.menuLeft .menuLeftIcon.active .line:nth-child(2){
		transform: translateX(-50%) translateY(-50%);
		opacity: 0;
	}
	.menuLeft .menuLeftIcon.active .line:nth-child(3){
		transform: translateX(-50%) translateY(calc(-50% + 3.5px)) rotate(-150deg);
	}
	.menuLeft .menuLeftBox{
		overflow-y: auto;
		height: 100%;
	}
	.menuLeft .menuLeftBox ul{
		list-style: none;
		padding: 0;
		margin: 0;
		overflow : hidden;
		position: relative;
	}
	.menuLeft .menuLeftBox ul li img{
		width: 30px;
		margin:0 5px;
	}
	.menuLeft .menuLeftBox ul li{
		/*height: 500px;*/
		/*border: 1px solid red;*/
		display: flex;
		align-items: center;
		padding: 1rem 0.5rem;
		color: #000;
		width: 100%;
	}
	.menuLeft .menuLeftBox ul li h6{
		/*display: none;*/
		/*width: 200px;*/
		/*height: 0;*/
		left: 70px;
		margin-bottom: 0;
		transition: .5s;
		overflow: hidden;
		position: absolute;
	}
	.menuLeft.active .menuLeftBox ul li h6{
		/*display: inline-block;*/
		width: au/*to;
		height: auto;*/
	}
	.router-link-exact-active.router-link-active li{
		background: var(--color-gradient);
		color: #fff !important;
	}
	.router-link-exact-active.router-link-active li img{
		filter: invert(1) sepia(0) saturate(1) hue-rotate(180deg) brightness(2);
	}
	@media (min-width: 992px){
		.menuLeft{
			width: 260px;
			left: 0;
			top: 54px;
			bottom: 0;
		}
		.menuLeft .menuLeftIcon{
			display: none;
		}

	.menuLeft .menuLeftBox ul li h6{
		display: inline-block;
		width: unset;
	}
	}
</style>
