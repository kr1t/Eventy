<template>
	<div>
		<menu-user/>
		<div class="content-menuUser">
			<div class="card p-3">
				<h2><span>การแจ้งเตือน</span></h2>
				<div class="row m-0">
					<div class="d-flex align-items-center justify-content-between w-100 border-bottom py-2 flex-column flex-lg-row" v-for="notification in notifications" :key="notification">
						<div class="d-flex flex-fill justify-content-start mr-auto">
							<div class="mr-3">
								<img :src="notification.image" width="40">
							</div>
							<div class="flex-fill">
								<p class="mb-0">{{ notification.title }}</p>
							</div>
						</div>
						<div>
							<button class="btn btn-sm btn-outline-main"><small>อ่านเพิ่มเติม</small></button>
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
				notifications:[
					{
						image : '/user/07.svg',
						title : 'ยืนยันการชำระเงิน NctBacktoschool2020',
					},
					{
						image : '/user/05.svg',
						title : 'ประกาศผลการคัดเลือกบูธร้านค้า NctBacktoschool2020',
					},
					{
						image : '/user/06.svg',
						title : 'ยืนยันการชำระเงิน Ticket#321234234',
					},
					{
						image : '/user/04.svg',
						title : 'ยืนยันการสมัครบูธร้านค้า',
					},
					{
						image : '/user/07.svg',
						title : 'NctBacktoschool2020 มีการอัพเดตเพิ่มเติม',
					},
					{
						image : '/user/07.svg',
						title : 'ยืนยันการสมัครบูธร้านค้า NctBacktoschool2020',
					},
				],
			}
		},
	  	components: {
	  		MenuUser,
	  	}
	};
</script>
