<template>
  <div>
    <menu-user />

    <div class="content-menuUser">
      <div class="card p-3">
        <h2><span>ตั๋วของฉัน</span></h2>
        <table class="table">
          <thead class="text-center">
            <tr class="text-left">
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
            <tr v-for="(i, index) in p" :key="i">
              <td>{{ index + 1 }}</td>
              <td>{{ i.event.title }}</td>
              <td>{{ i.user.name }}</td>
              <td>{{ i.event.date_text }}</td>
              <td>{{ i.event.time_text }}</td>
              <td>{{ i.event.map_name }}</td>
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
import { mapActions, mapGetters } from "vuex";
import MenuUser from "~/components/MenuUser.vue";
export default {
  data: function() {
    return {
      profile: {
        user: "@dominiccjj",
        name: "ม่านฟ้า",
        surname: "เรืองเดช",
        phone1: "0123456789",
        phone2: "0123456781",
        email: "dominiccjj@gmail.com",
        fb: "",
        tw: "@dominiccjj",
        ig: "@dominiccjj",
        yt: "",
        ln: "",
        ws: "www.dominiccjj.com"
      }
    };
  },
  components: {
    MenuUser
  },
  computed: {
    ...mapGetters({
      p: "purchase/purchases"
    })
  },
  methods: {
    ...mapActions({
      fetch: "purchase/fetch"
    })
  },
  created() {
    this.fetch();
  }
};
</script>
