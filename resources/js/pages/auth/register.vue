<template>
  <div>
    <div class="formLogin card p-4">
      <form @submit.prevent="register" @keydown="form.onKeydown($event)">
        <div class="title">
          <h2><span>Register</span></h2>
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
            <input
              type="password"
              class="form-control"
              id="password"
              placeholder="password"
              v-model="form.password"
            />
          </div>
          <div class="form-group">
            <label for="cfpassword">ยืนยันรหัสผ่าน</label>
            <input
              type="password"
              class="form-control"
              id="cfpassword"
              placeholder="comfirm password"
              v-model="form.password_confirmation"
            />
          </div>
          <div>
            <button class="btn btn-main form-control">สมัครสมาชิก</button>
          </div>
        </div>
        <div class="mt-4 text-center">
          <span class="text-gray"> มีชื่อผู้ใช้งานอยู่แล้ว </span>
          <router-link to="login"> เข้าสู่ระบบ </router-link>
        </div>
      </form>
    </div>
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
    return { title: this.$t("register") };
  },

  data: () => ({
    form: new Form({
      name: "",
      email: "",
      password: "",
      password_confirmation: "",
    }),
    mustVerifyEmail: false,
  }),

  methods: {
    async register() {
      // Register the user.
      const { data } = await this.form.post("/api/register");

      // Must verify email fist.
      if (data.status) {
        this.mustVerifyEmail = true;
      } else {
        // Log in the user.
        const {
          data: { token },
        } = await this.form.post("/api/login");

        // Save the token.
        this.$store.dispatch("auth/saveToken", { token });

        // Update the user.
        await this.$store.dispatch("auth/updateUser", { user: data });

        // Redirect home.
        this.$router.push({ name: "home" });
      }
    },
  },
};
</script>
