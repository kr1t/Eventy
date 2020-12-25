<template>
  <div>
    <form @submit.prevent="login" @keydown="form.onKeydown($event)">
      <div class="formLogin card p-4">
        <div class="title">
          <h2><span>Sign In With</span></h2>
        </div>
        <div class="d-flex">
          <div class="w-50 mr-2">
            <a href="#" class="btn btn-facebook form-control">
              <!-- <i class="fa fa-facebook-official"></i> -->
              <img
                src="/assets/icon/facebook-w.svg"
                alt="facebook"
                width="20"
              />
              Facebook
            </a>
          </div>
          <div class="w-50 ml-2">
            <a href="#" class="btn btn-google form-control">
              <img src="/assets/icon/icon-google.png" alt="GOOGLE" width="20" />
              Google
            </a>
          </div>
        </div>
        <div>
          <hr class="my-4" />
        </div>
        <div>
          <div class="form-group">
            <label for="username">อีเมล</label>
            <input
              type="text"
              class="form-control"
              id="email"
              placeholder="email"
              v-model="form.email"
            />
          </div>
          <div class="form-group">
            <label for="password">รหัสผ่าน</label>
            <span class="ml-2">
              <a href="#" class="text-gray"><small>ลืมรหัสผ่าน?</small></a>
            </span>
            <input
              type="password"
              class="form-control"
              id="password"
              placeholder="password"
              v-model="form.password"
              :class="{ 'is-invalid': form.errors.has('password') }"
            />
          </div>
          <div>
            <button class="btn btn-main form-control">เข้าสู่ระบบ</button>
          </div>
        </div>
        <div class="mt-4 text-center">
          <span class="text-gray"> ไม่มีชื่อผู้ใช้งาน? </span>

          <router-link to="register"> สมัครสมาชิก </router-link>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
import Form from "vform";
import LoginWithGithub from "~/components/LoginWithGithub";

export default {
  middleware: "guest",

  components: {
    LoginWithGithub,
  },

  metaInfo() {
    return { title: this.$t("login") };
  },

  data: () => ({
    form: new Form({
      email: "",
      password: "",
    }),
    remember: false,
  }),

  methods: {
    async login() {
      // Submit the form.
      const { data } = await this.form.post("/api/login");

      // Save the token.
      this.$store.dispatch("auth/saveToken", {
        token: data.token,
        remember: this.remember,
      });

      // Fetch the user.
      await this.$store.dispatch("auth/fetchUser");

      // Redirect home.
      this.$router.push({ name: "home" });
    },
  },
};
</script>
