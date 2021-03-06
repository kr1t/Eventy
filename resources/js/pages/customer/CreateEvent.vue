<template>
  <div class="container mt-4">
    <div class="new-event mt-5 mb-5">
      <h2>{{ id ? "แก้ไขอีเว้นท์" : "สร้างอีเว้นท์" }}</h2>
    </div>

    <div class="row">
      <div class="col col-lg-6">
        <div class="shadow new-event-img mb-3">
          <input
            type="file"
            name="img1"
            id="img1"
            style="width: 0; height: 0; overflow: hidden"
            @change="upload($event, 'image1')"
          />

          <label for="img1">
            <img :src="form.image1" alt="" width="100%" height="100%" />
            <img
              class="img-upload"
              src="https://icons-for-free.com/iconfiles/png/512/plus+icon-1320184416519705957.png"
              width="50"
            />
          </label>
        </div>
        <div class="row">
          <div class="col-4">
            <div class="shadow event-img-other">
              <input
                type="file"
                name="img2"
                id="img2"
                style="width: 0; height: 0; overflow: hidden"
                @change="upload($event, 'image2')"
              />

              <label for="img2">
                <img :src="form.image2" alt="" width="100%" height="100%" />
                <img
                  class="img-upload"
                  src="https://icons-for-free.com/iconfiles/png/512/plus+icon-1320184416519705957.png"
                  width="50"
                />
              </label>
            </div>
          </div>
          <div class="col-4">
            <div class="shadow event-img-other">
              <div class="shadow event-img-other">
                <input
                  type="file"
                  name="img3"
                  id="img3"
                  style="width: 0; height: 0; overflow: hidden"
                  @change="upload($event, 'image3')"
                />

                <label for="img3">
                  <img :src="form.image3" alt="" width="100%" height="100%" />
                  <img
                    class="img-upload"
                    src="https://icons-for-free.com/iconfiles/png/512/plus+icon-1320184416519705957.png"
                    width="50"
                  />
                </label>
              </div>
            </div>
          </div>
          <div class="col-4">
            <div class="shadow event-img-other">
              <input
                type="file"
                name="img4"
                id="img4"
                style="width: 0; height: 0; overflow: hidden"
                @change="upload($event, 'image4')"
              />

              <label for="img4">
                <img :src="form.image4" alt="" width="100%" height="100%" />
                <img
                  class="img-upload"
                  src="https://icons-for-free.com/iconfiles/png/512/plus+icon-1320184416519705957.png"
                  width="50"
                />
              </label>
            </div>
          </div>
        </div>
      </div>
      <div class="col col-lg-6">
        <div class="new-event-detail">
          <div class="new-event-form">
            <input
              type="text"
              class="form-control"
              placeholder="ระบุชื่องาน"
              v-model="form.title"
            />
            <div class="new-event-icon-input float-left mt-4">
              <div class="icon-new float-left">
                <i class="far fa-calendar-alt"></i>
              </div>
              <div class="icon-new-input float-left">
                <input
                  type="date"
                  class="form-control"
                  placeholder="กรุณาระบุวันที่"
                  v-model="form.date"
                />
              </div>
            </div>
            <div class="clear-fix"></div>

            <div class="new-event-icon-input float-left mt-2">
              <div class="icon-new float-left">
                <i class="fas fa-clock"></i>
              </div>
              <div class="icon-new-input float-left">
                <input
                  type="time"
                  class="form-control"
                  placeholder="กรุณาระบุเวลา"
                  v-model="form.time"
                />
                ถึง
                <input
                  type="time"
                  class="form-control"
                  placeholder="กรุณาระบุเวลาสิ้นสุด"
                  v-model="form.end_time"
                />
              </div>
            </div>

            <label class="mt-3">Tags</label>
            <b-form-tags 
              input-id="tags-basic"
              tag-variant="primary"
              tag-pills
              separator="  "
              v-model="form.tag"
            ></b-form-tags>

            <div class="e-info mt-3">
              <h5>ข้อมูลอีเว้นท์</h5>
              <textarea
                class="form-control"
                v-model="form.des"
                rows="10"
              ></textarea>
            </div>

            <hr />

            <div class="b-info mt-3">
              <h5 class="title-create">การจองบูธ</h5>
              <div class="form-group">
                <label for=""> เวลาเริ่มต้น </label>
                <input
                  type="date"
                  class="form-control"
                  placeholder="กรุณาระบุวันที่"
                  v-model="form.b_start"
                />
              </div>
              <div class="form-group">
                <label for=""> เวลาสิ้นสุด </label>

                <input
                  type="date"
                  class="form-control"
                  placeholder="กรุณาระบุวันที่"
                  v-model="form.b_end"
                />
              </div>

              <h6 class="sub-title-create">ประเภทสินค้า</h6>
              <div v-for="(item, index) in type" :key="item.id">
                <input
                  class="input-create"
                  type="text"
                  v-model="form.type[index].name"
                  placeholder="ชื่อ"
                />
                <input
                  class="input-create"
                  type="text"
                  v-model="form.type[index].price"
                  placeholder="ราคา"
                />

                <button @click="aType()" class="btn button-create">+</button>
              </div>

              <h6 class="sub-title-create">ขนาดบูธ</h6>
              <div v-for="(item, index) in size" :key="item.id">
                <input
                  class="input-create"
                  type="text"
                  v-model="form.size[index].name"
                  placeholder="ชื่อ"
                />
                <input
                  class="input-create"
                  type="text"
                  v-model="form.size[index].price"
                  placeholder="ราคา"
                />

                <input
                  class="input-create"
                  type="text"
                  v-model="form.size[index].amount"
                  placeholder="จำนวน"
                />

                <button @click="aSize()" class="btn button-create">+</button>
              </div>

              <h6 class="sub-title-create">อุปกรณ์ที่ต้องการเพิ่ม</h6>
              <div v-for="(item, index) in extra" :key="item.id">
                <input
                  class="input-create"
                  type="text"
                  v-model="form.extra[index].name"
                  placeholder="ชื่อ"
                />
                <input
                  class="input-create"
                  type="text"
                  v-model="form.extra[index].price"
                  placeholder="ราคา"
                />

                <button @click="aExtra()" class="btn button-create">+</button>
              </div>
            </div>

            <!-- จองบูธ -->
            <hr />
            <div class="e-event mt-4">
              <h5 class="title-create">รายละเอียดเกี่ยวกับตั๋วเข้างาน</h5>
              <div class="form-group">
                <label for=""> เวลาเริ่มต้น </label>
                <input
                  type="date"
                  class="form-control"
                  placeholder="กรุณาระบุวันที่"
                  v-model="form.t_start"
                />
              </div>
              <div class="form-group">
                <label for=""> เวลาสิ้นสุด </label>
                <input
                  type="date"
                  class="form-control"
                  placeholder="กรุณาระบุวันที่"
                  v-model="form.t_end"
                />
              </div>

              <div>
                <div
                  class="card p-2 mb-3"
                  v-for="(p, index) in price"
                  :key="index"
                >
                  <input
                    class="input-create"
                    type="text"
                    placeholder="ราคา"
                    v-model="form.prices[index].price"
                  />

                  <div
                    class="detail"
                    v-for="(time, i) in form.prices[index].times"
                    :key="i"
                  >
                    เวลาเริ่ม
                    <input
                      class="input-create"
                      type="time"
                      placeholder=""
                      v-model="form.prices[index].times[i].start"
                    />
                    เวลาสิ้นสุด
                    <input
                      class="input-create"
                      type="time"
                      placeholder=""
                      v-model="form.prices[index].times[i].end"
                    />
                    <input
                      class="input-create"
                      type="text"
                      placeholder="จำนวน"
                      v-model="form.prices[index].times[i].amount"
                    />
                    <button
                      @click="aDetail(index)"
                      class="btn button-create-text"
                    >
                      เพิ่มเวลาอื่นๆ
                    </button>
                    <hr />
                  </div>
                </div>
                <button @click="aPrice()" class="btn button-create-text">
                  เพิ่มราคา
                </button>
              </div>
            </div>

            <hr />
            <div class="e-event mt-4">
              <h5 class="title-create">แผนที่การเดินทาง</h5>
              <div>
                <input
                  class="input-create"
                  type="text"
                  placeholder="ชื่อสถานที่"
                  v-model="form.map_name"
                />
                <input
                  class="input-create"
                  type="text"
                  placeholder="รายละเอียดสถานที่"
                  v-model="form.map_address"
                />
                <input
                  class="input-create"
                  type="text"
                  placeholder="Google Map Url"
                  v-model="form.google_map_url"
                />
                <input
                  class="input-create"
                  type="text"
                  placeholder="mrt"
                  v-model="form.mrt"
                />
                <input
                  class="input-create"
                  type="text"
                  placeholder="bts"
                  v-model="form.bts"
                />
                <input
                  class="input-create"
                  type="text"
                  placeholder="bus"
                  v-model="form.bus"
                />
                <input
                  class="input-create"
                  type="text"
                  placeholder="สถานที่ใกล้เคียง"
                  v-model="form.near_location"
                />
                <hr class="mb-2" />

                <button @click="create()" class="btn button-create-text w-100">
                  {{ id ? "แก้ไข" : "บันทึก" }}
                </button>

                <hr class="mb-5" />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import { mapGetters, mapActions } from "vuex";

export default {
  data: () => ({
    form: {
      image1: "",
      image2: "",
      image3: "",
      image4: "",
      type: [{ name: "", price: "" }],
      size: [{ name: "", price: "", amount: "" }],
      extra: [{ name: "", price: "" }],
      prices: [
        { price: "", times: [{ start: "", end: "", amount: "" }], time: 1 }
      ]
    },
    type: 1,
    size: 1,
    extra: 1,
    price: 1,
    id: false
  }),
  computed: {
    ...mapGetters({
      event: "event/event"
    })
  },
  created: async function() {
    this.id = this.$route.params.id;
    if (this.id) {
      await this.show(this.id);
      this.setVar();
    }

    // this.image1 = "/post/0" + this.id + ".png";
  },
  methods: {
    setVar() {
      let e = this.event;

      this.form.image1 = e.image1;
      this.form.image2 = e.image2;
      this.form.image3 = e.image3;
      this.form.image4 = e.image4;
      this.type = e.types.length;
      this.form.type = e.types;

      this.type = e.sizes.length;
      this.form.size = e.sizes;

      this.extra = e.extras.length;
      this.form.extra = e.extras;

      this.price = e.prices.length;
      this.form.prices = e.prices;

      console.log(this.form.price);

      let a = [
        "title",
        "date",
        "time",
        "end_time",
        "tag",
        "des",
        "b_start",
        "b_end",
        "map_name",
        "map_address",
        "google_map_url",
        "mrt",
        "bts",
        "bus",
        "near_location"
      ];
      a.map(el => {
        this.form[el] = e[el];
      });
    },
    ...mapActions({ show: "event/show" }),
    aType() {
      this.type++;
      this.form.type.push({ name: "", price: "" });
    },
    aSize() {
      this.size++;
      this.form.size.push({ name: "", price: "", amount: "" });
    },
    aExtra() {
      this.extra++;
      this.form.extra.push({ name: "", price: "" });
    },
    aPrice() {
      this.price++;
      this.form.prices.push({
        price: "",
        times: [{ start: "", end: "", amount: "" }],
        time: 1
      });
    },
    aDetail(index) {
      this.form.prices[index].times.push({ start: "", end: "", amount: "" });
    },
    submit() {
      if (this.id) {
        return this.edit();
      }

      return this.create();
    },
    async create() {
      const { data } = await axios.post("/api/events", this.form);
      this.$router.push("/event/" + data.id);
      this.$bvToast.toast("สร้าง อีเว้นท์สำเร็จ", {
        title: "สร้าง อีเว้นท์สำเร็จ",
        variant: "success",
        solid: true
      });
      console.log(data);
    },
    async edit() {
      const { data } = await axios.put(`/api/event/${this.id}`, this.form);
      this.$router.push("/event/" + data.id);
      this.$bvToast.toast("แก้ไข อีเว้นท์สำเร็จ", {
        title: "แก้ไข อีเว้นท์สำเร็จ",
        variant: "success",
        solid: true
      });
      console.log(data);
    },
    async upload(e, name) {
      let file = e.target.files[0];
      let form = new FormData();
      form.append("uploadFileObj", file);
      const { data } = await axios.post("/api/image/upload", form);
      this.form[name] = data.url;
    }
  }
};
</script>

<style>
img {
  object-fit: cover;
}
</style>
<style scoped>
.d-fixed {
  font-weight: 300 !important;
  font-size: 12px !important;
}
#example-datepicker {
  font-weight: 300 !important;
  font-size: 12px !important;
}
.new-event-img {
  width: 100%;
  height: 600px;
}
.event-img-other {
  width: 100%;
  height: 100px;
}
.icon-new {
  width: 40px;
  height: 40px;
}
.new-event-detail {
  width: 100%;
}
.icon-new i {
  width: 40px;
  height: 40px;
  text-align: center;
  font-size: 20px;
  margin-top: 10px;
}
/* .new-event-form input {
  width: 100%;
  border: none;
  border-radius: 0px;
  outline: none !important;
  border-bottom: 1px solid #fd4e52;
} */
.new-event-icon-input {
  width: 100%;
  margin-top: 10px;
  margin-bottom: 10px;
}
.dropdown-menu {
  font-size: 14px;
}
.input-create {
  padding: 5px;
  border-radius: 5px;
  border: 1px solid #ccc;
  margin-top: 5px;
  margin-bottom: 5px;
}
.button-create {
  width: 35px;
  height: 35px;
  background: var(--color-gradient);
  color: #fff;
  font-size: clamp(12px, 2vw, 14px);
  padding-left: 15px;
  padding-right: 20px;
  padding-top: 4px;
  padding-bottom: 4px;
  border-radius: 20px;
  transition: 0.5s;
}
.button-create-text {
  background: var(--color-gradient);
  color: #fff;
  font-size: clamp(12px, 2vw, 14px);
  padding-left: 20px;
  padding-right: 20px;
  padding-top: 4px;
  padding-bottom: 4px;
  border-radius: 20px;
  transition: 0.5s;
}
.title-create {
  margin-bottom: 20px;
}
.sub-title-create {
  margin-top: 25px;
}
.badge {
  margin-right: 10px !important;
}
.img-upload {
  position: absolute;
  margin: -30px;
}
hr {
  margin-top: 1rem;
  margin-bottom: 1rem;
  border: 0;
  border-top: 1px solid rgba(236, 91, 91, 0.767) !important;
}
</style>
