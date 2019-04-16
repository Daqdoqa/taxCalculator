<template>
    <div class="container">
        <h3>الحاسبة الالكترونية لضريبة الدخل لسنة {{ year }}</h3>

        <form method="get">

            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <label class="btn btn-primary active">
                    <input type="radio" name="resident" id="yes" autocomplete="off" checked> لا
                </label>
                <label class="btn btn-primary">
                    <input type="radio" name="resident" id="no" autocomplete="off"> نعم
                </label>    
            </div>
            <label>الاقامة في الاردن</label>
            
            <br><br>

           <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <label class="btn btn-primary active">
                    <input type="radio" name="maritial_status" id="married" autocomplete="off" checked>غير متزوج 
                </label>
                <label class="btn btn-primary">
                    <input type="radio" name="maritial_status" id="notMarried" autocomplete="off">  متزوج
                </label>    
            </div>
            <label>الحالة الاجتماعية</label>

            <br><br>
            
            <label>مجموع الدخل السنوي للزوجة</label>
            <input class="form-control" type="text">

            <br><br>

            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <label class="btn btn-primary active">
                    <input type="radio" name="spouse_resident" id="yes" autocomplete="off" checked> لا
                </label>
                <label class="btn btn-primary">
                    <input type="radio" name="spouse_resident" id="no" autocomplete="off"> نعم
                </label>    
            </div>
            <label>هل الزوجة مقيمة؟</label>
            
            <br><br>

            <label>مجموع الدخل السنوي للزوج</label>
            <input class="form-control" type="text">

            <button type="submit" class="btn btn-primary">احسب الضريبة</button>
        </form>

    </div>
</template>

<script>
    module.exports = {
        data: function () {
            return {
                year: new Date().getFullYear()
            }
        }
    }
</script>

<style scoped>
.container {
    height: 60%;
    width: 60%
}

h3 {
    text-align: center
}

</style>
