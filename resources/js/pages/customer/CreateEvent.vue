<template>
    <div class="container mt-4">

        <div class="new-event mt-5 mb-5">
            <h2>สร้างอีเว้นท์</h2>
        </div>
        <div class="row">
            <div class="col col-lg-6">
                <div class="shadow new-event-img mb-3">
                    img
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="shadow event-img-other">
                            mini img
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="shadow event-img-other">
                            mini img
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="shadow event-img-other">
                            mini img
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="col col-lg-6">
            <div class="new-event-detail">
                <div class="new-event-form">
                    <form action="">

                    <input type="text" class="form-control" placeholder="ระบุชื่องาน">

                    <div class="new-event-icon-input float-left mt-4">

                        <div class="icon-new float-left">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="icon-new-input float-left">
                                <input type="text" class="form-control" placeholder="กรุณาระบุเวลา"/>	
                        </div>

                    </div>

                    <div class="clear-fix"></div>

                    <div class=" new-event-icon-input float-left">

                        <div class="icon-new float-left">
                            <i class="far fa-calendar-alt"></i> 
                        </div>
                        <div class="icon-new-input float-left">
                            <input type="text" class="form-control" placeholder="กรุณาระบุวันที่"/>	
                        </div>

                    </div>

                    <label class="mt-3">Tags</label>
                    <input type="text" class="form-control" placeholder="#HASTAG"/>
   
                    </form>
                </div>
            </div>
            </div>
        </div>
        
    </div>
</template>

<style scoped>
.new-event-img{
    width: 100%;
    height: 600px;
}
.event-img-other{
    width: 100%;
    height: 100px;
}
.icon-new{
    width: 40px;
    height: 40px;
}
.new-event-detail{
    width: 100%;
}
.icon-new i{
    width: 40px;
    height: 40px;
    text-align: center;
    font-size: 20px;
    margin-top: 10px;
}
.new-event-form input{
    width: 100%;
    border: none;
    border-radius: 0px;
    outline: none !important;
    border-bottom: 1px solid #FD4E52;
}
.new-event-icon-input {
    width: 100%;
    margin-top: 10px;
    margin-bottom: 10px;
}

</style>