<template>
	<div>
		<menu-user/>
		<div class="content-menuUser">
			<div class="card p-3">
				<h2><span>สินค้าพรีออเดอร์</span></h2>
			</div>
		</div>
	</div>
</template>
<script>
	import MenuUser from "~/components/MenuUser.vue";
	export default {
		data:function(){
			return{
			}
		},
	  	components: {
	  		MenuUser,
	  	}
	};
</script>
