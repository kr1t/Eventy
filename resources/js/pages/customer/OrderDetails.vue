<template>
  <div class="container">
    <form-wizard
      nextButtonText="ถัดไป"
      backButtonText="ย้อนกลับ"
      finishButtonText="กลับสู่หน้าหลัก"
      title=""
      subtitle=""
      stepSize="xs"
      @on-change="onComplete"
    >
      <tab-content title="รายละเอียดตั๋ว">
        <div class="row">
          <div class="col-lg-8">
            <div class="card p-3">
              <div class="row">
                <div class="col-lg-6">
                  <img :src="order.image1" class="custom-img" />
                </div>
                <div class="col-lg-6 my-2">
                  <h2 class="text-main">
                    <strong>{{ order.title }}</strong>
                  </h2>
                  <small class="text-muted my-3"
                    >Owner By {{ order.user.name }}</small
                  >
                  <div class="d-flex align-items-center my-2">
                    <div class="iconBtn">
                      <img src="/assets/icon/calendar.png" class="img-fluid" />
                    </div>
                    <div class="ml-2">
                      <p class="mb-0">{{ order.date }}</p>
                    </div>
                  </div>
                  <div class="d-flex align-items-center my-2">
                    <div class="iconBtn">
                      <img src="/assets/icon/time.png" class="img-fluid" />
                    </div>
                    <div class="ml-2">
                      <p class="mb-0">{{ order.time }}</p>
                    </div>
                  </div>
                  <div class="d-flex align-items-center my-2">
                    <div class="iconBtn">
                      <img src="/assets/icon/pin.png" class="img-fluid" />
                    </div>
                    <div class="ml-2">
                      <p class="mb-0">{{ order.map_name }}</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card p-3 my-4">
              <div v-for="(ticket, i) in order.tickets" :key="i">
                <h2>
                  <strong>ราคาตั๋ว : {{ ticket.price }}</strong>
                </h2>
                <div
                  class="col-lg-12"
                  v-for="(round, i_r) in ticket.times"
                  :key="i_r"
                >
                  <div class="row d-flex align-items-center">
                    <div class="col">
                      <p class="m-0">{{ round.start }} - {{ round.end }}</p>
                    </div>
                    <div class="col">
                      <p class="text-right m-0">{{ ticket.price + " /ใบ" }}</p>
                    </div>
                    <div class="col">
                      <select
                        class="form-control form-control-sm"
                        @input="selectTicketTime(i, i_r, $event.target.value)"
                      >
                        <option value="0">0</option>
                        <option v-for="num in +round.amount" :key="num">
                          {{ num }}
                        </option>
                      </select>
                    </div>
                  </div>
                  <hr class="w-100" />
                </div>
              </div>
              <h2>{{ "ข้อแนะนำเพิ่มเติม" }}</h2>
              <textarea class="form-control" rows="5"></textarea>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="card p-3">
              <h2 class="text-main">
                <strong>{{ "ค่าใช้จ่าย" }}</strong>
              </h2>
              <hr class="w-100" />
              <div
                class="row d-flex justify-content-between"
                v-for="(ticket, i_t) in selectedTickets"
                :key="i_t"
              >
                <div class="col-8">
                  <p>{{ ticket.nums + " x รอบเวลา: " + ticket.round }}</p>
                </div>
                <div class="col-4">
                  <p class="text-right">{{ ticket.total_price + " .-" }}</p>
                </div>
              </div>
              <hr class="w-100" />
              <div class="row d-flex justify-content-between">
                <div class="col-8">
                  <p>{{ "ราคาไม่รวมภาษีมูลค่าเพิ่ม" }}</p>
                </div>
                <div class="col-4">
                  <p class="text-right">{{ summ - summVat + " .-" }}</p>
                </div>
                <div class="col-8">
                  <p>{{ "ภาษีมูลค่าเพิ่ม" }}</p>
                </div>
                <div class="col-4">
                  <p class="text-right">{{ summVat + " .-" }}</p>
                </div>
                <!-- <hr class="w-100" /> -->
                <!-- <div class="col-8">
                  <p>{{ "ยอดสุทธิ" }}</p>
                </div>
                <div class="col-4">
                  <p class="text-right">{{ "200" + " .-" }}</p>
                </div> -->
                <hr class="w-100" />
                <div class="col-8">
                  <h4>{{ "รวมทั้งสิ้น" }}</h4>
                </div>
                <div class="col-4">
                  <p class="text-right text-main">{{ summ + " .-" }}</p>
                </div>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" />
                <label class="form-check-label">
                  ยินยอมเงื่อนไข-ข้อตกลง และเกณฑ์การคัดเลือกของ "{{
                    order.title
                  }}" ทุกประการ
                </label>
              </div>
            </div>
          </div>
        </div>
      </tab-content>
      <tab-content title="การชำระเงิน">
        <div class="row">
          <div class="col-lg-12">
            <div class="card p-3 my-4">
              <h2>{{ "ข้อมูลผู้ซื้อ" }}</h2>
              <div class="row">
                <div class="form-group col-lg-6">
                  <label>ชื่อ</label>
                  <input
                    type="text"
                    class="form-control"
                    placeholder="กรอกชื่อจริง"
                  />
                </div>
                <div class="form-group col-lg-6">
                  <label>นามสกุล</label>
                  <input
                    type="text"
                    class="form-control"
                    placeholder="กรอกนามสกุล"
                  />
                </div>
              </div>
              <div class="row">
                <div class="form-group col-lg-6">
                  <label>อีเมล์</label>
                  <input
                    type="text"
                    class="form-control"
                    placeholder="กรอกอีเมล์"
                  />
                </div>
                <div class="form-group col-lg-6">
                  <label>โทรศัพท์</label>
                  <input
                    type="text"
                    class="form-control"
                    placeholder="กรอกเบอร์โทรศัพท์"
                  />
                </div>
              </div>
            </div>
            <div class="card p-3 my-4">
              <h2>{{ "ช่องทางการชำระเงิน" }}</h2>
              <div class="row my-2">
                <div class="col-lg-4 my-1">
                  <button
                    type="button"
                    class="btn btn-outline-primary btn-block"
                  >
                    <div class="form-group">
                      <div>
                        <img
                          src="https://www.visa.com/images/merchantoffers/2020-04/1588059393757.visa_logo_400x150.jpg"
                          class="custom-btn-img"
                        />
                      </div>
                      <label>บัตรเครคิด / เดบิต</label>
                    </div>
                  </button>
                </div>
                <div class="col-lg-4 my-1">
                  <button
                    type="button"
                    class="btn btn-outline-primary btn-block"
                  >
                    <div class="form-group">
                      <div>
                        <img
                          src="https://blog.loga.app/wp-content/uploads/2019/07/payment.png"
                          class="custom-btn-img"
                        />
                      </div>
                      <label>ชำระเงินผ่าน QR CODE</label>
                    </div>
                  </button>
                </div>
                <div class="col-lg-4 my-1">
                  <button
                    type="button"
                    class="btn btn-outline-primary btn-block"
                  >
                    <div class="form-group">
                      <div>
                        <img
                          src="https://technointrend.com/wp-content/uploads/2017/12/paypal_logo.jpg"
                          class="custom-btn-img"
                        />
                      </div>
                      <label>ชำระเงินผ่าน PayPal</label>
                    </div>
                  </button>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-lg-12">
                  <label>ชื่อที่ปรากฎบนบัตร</label>
                  <input
                    type="text"
                    class="form-control"
                    placeholder="กรอกชื่อที่ปรากฎบนบัตร"
                  />
                </div>
              </div>
              <div class="row">
                <div class="form-group col-lg-6">
                  <label>หมายเบขบัตรเครดิต/เดบิต</label>
                  <input
                    type="text"
                    class="form-control"
                    placeholder="e.g 11112222333444"
                  />
                </div>
                <div class="form-group col-lg-3">
                  <label>วันหมดอายุ</label>
                  <input type="text" class="form-control" placeholder="MM/YY" />
                </div>
                <div class="form-group col-lg-3">
                  <label>CVV</label>
                  <input type="text" class="form-control" placeholder="000" />
                </div>
              </div>
            </div>
          </div>
        </div>
      </tab-content>
      <tab-content title="เสร็จสิ้น">
        <div class="row">
          <div class="col-lg-12">
            <div class="card p-3">
              <div class="text-center">
                <i
                  class="fa fa-check-circle-o fa-5x famix"
                  aria-hidden="true"
                ></i>
              </div>
              <h2 class="text-center">{{ "ชำระเงินเสร็จสิ้น" }}</h2>
              <p class="text-center text-muted">
                ตรวจสอบการชำระเงิน
                <a href="/profile/ticket" class="text-main"> คลิ๊กที่นี้</a>
              </p>
              <p class="text-center text-muted">
                หากไม่ได้รับการยืนยันกรุณาติดต่อภายใน 24 ชม.
              </p>
              <div class="row">
                <div class="col-lg-6">
                  <img :src="order.image1" class="custom-success-img" />
                </div>
                <div class="col-lg-6 my-2">
                  <h2 class="text-main">
                    <strong>{{ order.title }}</strong>
                  </h2>
                  <small class="text-muted my-3"
                    >Owner By {{ order.user.name }}</small
                  >
                  <div class="d-flex align-items-center my-2">
                    <div class="iconBtn">
                      <img src="/assets/icon/calendar.png" class="img-fluid" />
                    </div>
                    <div class="ml-2">
                      <p class="mb-0">{{ order.date }}</p>
                    </div>
                  </div>
                  <div class="d-flex align-items-center my-2">
                    <div class="iconBtn">
                      <img src="/assets/icon/time.png" class="img-fluid" />
                    </div>
                    <div class="ml-2">
                      <p class="mb-0">{{ order.time }}</p>
                    </div>
                  </div>
                  <div class="d-flex align-items-center my-2">
                    <div class="iconBtn">
                      <img src="/assets/icon/pin.png" class="img-fluid" />
                    </div>
                    <div class="ml-2">
                      <p class="mb-0">{{ order.map_name }}</p>
                    </div>
                  </div>
                </div>
              </div>
              <table class="table my-3">
                <thead>
                  <tr>
                    <th scope="col">รายการ</th>
                    <th scope="col">ราคา</th>
                    <th scope="col">จำนวน</th>
                    <th scope="col">รวม</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(ticket, i_t) in selectedTickets" :key="i_t">
                    <td>{{ "รอบเวลา: " + ticket.round }}</td>
                    <td>{{ ticket.price }}</td>
                    <td>{{ ticket.nums }}</td>
                    <td>{{ ticket.total_price }}</td>
                  </tr>
                </tbody>
                <tr>
                  <td colspan="3" class="text-right text-main">
                    {{ "รวมทั้งสิ้น" }}
                  </td>
                  <td colspan="1" class="text-main">{{ summ }}</td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </tab-content>
    </form-wizard>
  </div>
</template>
<script>
import { mapGetters, mapActions } from "vuex";
import { sumBy } from "lodash";
import axios from "axios";
export default {
  name: "OrderDetails",
  computed: {
    ...mapGetters({
      order: "event/event"
    }),
    summ() {
      return sumBy(this.selectedTickets, "total_price");
    },
    summVat() {
      return (sumBy(this.selectedTickets, "total_price") * 7) / 100;
    }
  },
  data() {
    return {
      id: 0,
      selectedTickets: [
        // {
        //   round: "12.00 - 13.00",
        //   nums: "2",
        //   price: "200",
        //   total_price: "400",
        // },
      ],
      orderx: {
        id: 0,
        price: 2500,
        image: "",
        url: "",
        title: "",
        date: "",
        time: "",
        place: ""
      },
      tmp_orders: [
        {
          id: 1,
          price: 2500,
          image: "/post/01.png",
          url: "",
          title:
            "ICSA Course 2020 by Qten teacher ICSA Course 2020 by Qten teacher ICSA Course 2020 by Qten teacher",
          date: "15 กันยายน 2563",
          time: "08.00 - 15.00น.",
          place: "Impact Exhibition Hall 5"
        },
        {
          id: 2,
          price: 2500,
          image: "/post/02.png",
          url: "",
          title: "Music events live in concert 2020",
          date: "15 กันยายน 2563",
          time: "08.00 - 15.00น.",
          place: "Impact Exhibition Hall 5"
        },
        {
          id: 3,
          price: 2500,
          image: "/post/03.png",
          url: "",
          title: "5.5 Shopping Day by Robinson",
          date: "15 กันยายน 2563",
          time: "08.00 - 15.00น.",
          place: "Impact Exhibition Hall 5"
        },
        {
          id: 4,
          price: 2500,
          image: "/post/04.png",
          url: "",
          title: "Furniture Fare 2020 by IKEA",
          date: "15 กันยายน 2563",
          time: "08.00 - 15.00น.",
          place: "Impact Exhibition Hall 5"
        },
        {
          id: 5,
          price: 2500,
          image: "/post/05.png",
          url: "",
          title: "Furmiture Festival 10.10 ตุลาคม",
          date: "15 กันยายน 2563",
          time: "08.00 - 15.00น.",
          place: "Impact Exhibition Hall 5"
        }
      ],
      tickets: [
        {
          price: 100,
          rounds: [
            "10.00 - 11.00",
            "11.00 - 12.00",
            "12.00 - 13.00",
            "13.00 - 14.00",
            "14.00 - 15.00",
            "15.00 - 16.00"
          ],
          nums: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10]
        },
        {
          price: 150,
          rounds: [
            "10.00 - 11.00",
            "11.00 - 12.00",
            "12.00 - 13.00",
            "13.00 - 14.00",
            "14.00 - 15.00",
            "15.00 - 16.00"
          ],
          nums: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10]
        }
      ]
    };
  },
  created() {
    this.id = this.$route.params.id;
    this.show(this.id);

    this.setDetails();
  },

  methods: {
    ...mapActions({ show: "event/show" }),
    async onComplete(prevIndex, nextIndex) {
      console.log(prevIndex, nextIndex);

      if (nextIndex <= 1) {
        return 0;
      }
      const { data } = await axios.post("/api/purchases", {
        times: this.selectedTickets,
        event_id: this.id,
        sum: this.summ
      });
      this.$bvToast.toast("ซื้อตั๋วเข้างานสำเร็จ", {
        title: "ซื้อตั๋วเข้างานสำเร็จ",
        variant: "success",
        solid: true
      });
      console.log(data);
    },

    setDetails() {
      let res = this.tmp_orders.find(order => {
        return order.id == this.id;
      });
      this.order = {
        id: res.id,
        price: res.price,
        image: res.image,
        url: res.url,
        title: res.title,
        date: res.date,
        time: res.time,
        place: res.place
      };
    },
    selectTicketTime(i, i_r, event) {
      let ticket = this.order.tickets[i];
      let d = this.selectedTickets.findIndex(el => el.id == i_r);
      console.log(d);
      if (d != -1) {
        this.selectedTickets.splice(d, 1);
      }
      if (event < 1) {
        return false;
      }
      let details = {
        round: ticket.times[i_r].start + "-" + ticket.times[i_r].end,
        nums: event,
        price: ticket.price,
        id: i_r,
        total_price: this.sumTicket(event, ticket.price)
      };
      this.selectedTickets.push(details);
    },
    sumTicket(nums, price) {
      return +nums * +price;
    }
  }
};
</script>
<style scoped>
.custom-img {
  width: 100%;
  min-height: 300px;
  max-height: auto;
  float: left;
  margin: 3px;
  padding: 3px;
}
.custom-success-img {
  width: 250px;
  min-height: 200px;
  max-height: auto;
  float: right;
  margin: 3px;
  padding: 3px;
}
.custom-btn-img {
  width: 130px;
  height: 60px;
  float: center;
  margin: 3px;
  padding: 3px;
}
input {
  background-color: transparent;
  border: unset;
  border-bottom: 1px solid #d4d4d4;
  border-radius: unset;
}
.btn-outline-primary {
  color: #000;
}
.btn-outline-primary:hover {
  color: #000;
  background-color: #ffffff00;
}
.btn-outline-primary:not(:disabled):not(.disabled):active,
.btn-outline-primary:not(:disabled):not(.disabled).active,
.show > .btn-outline-primary.dropdown-toggle {
  color: #000;
  background-color: #a3222200;
}
.form-control:focus,
.btn:focus,
.btn.focus {
  border-color: #e75e38;
  box-shadow: unset;
}
.famix {
  color: #50da50;
  font-size: 150px;
  margin: 30px;
}
</style>
