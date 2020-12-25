<template>
  <header class="w-100">
    <div class="container">
      <div id="menu">
        <div id="logo">
          <router-link to="/">
            <span>EVENTY</span>
          </router-link>
        </div>
        <ul>
          <li class="d-lg-none">
            <router-link to="/home" exact>
              <div class="icon">
                <i class="fa fa-home" aria-hidden="true"></i>
              </div>
              หน้าแรก
            </router-link>
          </li>
          <li>
            <router-link to="/event" exact>
              <div class="icon">
                <i class="fa fa-eercast" aria-hidden="true"></i>
              </div>
              อีเว้นท์
            </router-link>
          </li>
          <li>
            <router-link to="/booth/detail/:id" exact>
              <div class="icon">
                <i class="fa fa-gitlab" aria-hidden="true"></i>
              </div>
              <span class="d-none d-lg-inline-block">สำหรับ</span>ร้านค้า
            </router-link>
          </li>
          <li>
            <router-link to="/organizer" exact>
              <div class="icon">
                <i class="fa fa-id-badge" aria-hidden="true"></i>
              </div>
              <span class="d-none d-lg-inline-block">สำหรับ</span>ผู้จัดงาน
            </router-link>
          </li>
          <li class="d-none d-lg-block">
            |
          </li>
          <li v-if="!userAuth.id">
            <router-link to="/login" exact>
              <div class="icon">
                <i class="fa fa-cog" aria-hidden="true"></i>
              </div>
              เข้าสู่ระบบ
            </router-link>
          </li>
          <li v-else>
            <router-link to="/profile">
              <div class="icon">
                <i class="fa fa-cog" aria-hidden="true"></i>
              </div>
              {{ userAuth.username }}
            </router-link>
          </li>
        </ul>
      </div>
      <!-- d-flex -->
    </div>
    <!-- container -->
  </header>
</template>
<script>
export default {
  data: function() {
    return {
      userAuth: {
        id: "",
        username: ""
      }
    };
  },
  methods: {

  },
  mounted: function() {
    let _this = this;
    setInterval(function(){
      if (_this.$session.get("user_id")) {
        _this.userAuth.id = _this.$session.get("user_id");
        _this.userAuth.username = _this.$session.get("user_username");
      }else{
        _this.userAuth.id = "";
        _this.userAuth.username = "";
      }
    },500);
  }
};
</script>
<style type="text/css" scoped>
  header #menu ul li  a.router-link-exact-active.router-link-active{
    color: var(--color-main) !important;
  }
</style>
