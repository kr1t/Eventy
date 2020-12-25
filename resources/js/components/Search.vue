<template>
  <div class="search">
    <div class="card py-4" style="background-color: #F5F6F8;">
      <div class="d-flex flex-column flex-lg-row">
        <div class="d-flex flex-fill mr-4">
          <div class="flex-fill mr-4">
            <input type="text" class="form-control" placeholder="ค้นหาอีเว้นท์" />
          </div>
          <div class="flex-fill">
            <select class="form-control" v-model="selectPlace">
              <option value="" selected="" disabled="">เลือกสถานที่</option>
              <option
                v-for="place in places"
                :key="place.id"
                :value="place.value"
              >
                {{ place.name }}
              </option>
            </select>
          </div>
        </div>
        <div class="mt-3 mt-lg-0">
          <button class="btn btn-main form-control">
            <img src="/assets/icon/search.svg" width="12" />
            ค้นหา
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data: function() {
    return {
      // slides: ["images/banner-1.png", "images/banner-2.png"],
      selectPlace: "",
      places: [
        {
          name: "10Arts",
          value: 1
        },
        {
          name: "Impact Arena",
          value: 2
        }
      ]
    };
  }
};
</script>
