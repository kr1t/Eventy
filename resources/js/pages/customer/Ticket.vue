<template>
	<div>
		<menu-user/>
		<div class="content-menuUser">
			<div class="card p-3">
				<h2><span>ตั๋วของฉัน</span></h2>
				<table class="table table-responsive">
					<thead class="text-center">
						<tr>
							<th>ลำดับ</th>
							<th>ชื่องาน</th>
							<th>ผู้จัด</th>
							<th>วันจัดงาน</th>
							<th>เวลา</th>
							<th>สถานที่</th>
							<th>สถานะ</th>
							<th>ติดต่อผู้จัด</th>
						</tr>
					</thead>
					<tbody>
						<tr v-for="i in 7" :key="i">
							<td>{{ i }}</td>
							<td>NCTBACKTOSHCOOL2020</td>
							<td>Withcraft</td>
							<td>01 / 10 / 2020</td>
							<td>1{{ i }}.00  - 1{{ i+1 }}.00 น.</td>
							<td>10 house</td>
							<td><span class="text-success">ชำระเงินเรียบร้อยแล้ว</span></td>
							<td>ติดต่อผู้จัด</td>
						</tr>
					</tbody>
					<tfoot></tfoot>
				</table>
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
