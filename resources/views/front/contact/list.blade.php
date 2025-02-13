@extends("front.comm")
@section("content")

        <div class="container mt-5 ">
            <div class="h5 fw-700 text-center text-warning">聯絡我們</div>

            <div class="row justify-content-center ">
                <div class="col-md-12">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14559.182967983883!2d120.59179812669754!3d24.178895246025856!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x34693e1e5070a7a7%3A0xa462167a0845084d!2sLuce%20Memorial%20Chapel!5e0!3m2!1sen!2stw!4v1722912461537!5m2!1sen!2stw"
                        width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="" class="form-label">姓名</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">電話</label>
                        <input type="tel" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Email</label>
                        <input type="email" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">人數</label>
                        <input type="number" class="form-control">
                    </div>
                    <div class="mb-3 ">
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" name="person">
                            <label for="person" class="form-check-label">個人</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" name="person">
                            <label for="person" class="form-check-label">公司組織</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" name="person">
                            <label for="person" class="form-check-label">廠商合作</label>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-secondary w-20 mt-2 ">取消</button>
                <button type="button" class="btn btn-info w-20 mt-2">確認</button>
            </div>
        </div>

@endsection