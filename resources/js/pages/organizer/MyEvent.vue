<template>
  <div>
    <menu-user />
    <div class="content-menuUser">
      <div class="card p-3">
        <h2>
          <span>อีเว้นท์ของฉัน</span> |
          <select class="form-control d-inline w-25" v-model="s">
            <option :value="e.id" v-for="e in user.events" :key="e.id">
              {{ e.title }}
            </option>
          </select>
        </h2>

        <table class="table">
          <thead class="text-center">
            <tr class="text-left">
              <th>ลำดับ</th>
              <th>เวลา</th>
              <th>ร้านค้าที่เข้าร่วม</th>
              <th>ยอดชำระ</th>
              <th>สถานะ</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(i, index) in fil.booth_purchases" :key="i">
              <td>{{ i.id }}</td>
              <td>{{ fil.time_text }}</td>

              <td>
                <img :src="i.user.photo_url" width="30" />

                {{ i.user.name }}
              </td>

              <td>{{ i.sum }} บาท</td>
              <td>
                <button class="btn btn-main d-flex">
                  <p class="mb-0 ml-2">ชำระเงินแล้ว</p>
                </button>
              </td>
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
import { mapGetters } from "vuex";
export default {
  data() {
    return {
      s: 1
    };
  },
  components: {
    MenuUser
  },
  computed: {
    ...mapGetters({
      user: "auth/user"
    }),
    fil() {
      return this.user.events.find(el => el.id == this.s);
    }
  },

  mounted() {
    this.s = this.user.events[0].id;
  }
};
</script>

<style></style>
