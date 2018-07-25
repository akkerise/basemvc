<h4>Mark Location</h4>
<hr>
<div class="row" onload="mapsvin.load();">
    <div class="col">
        <div class="form-group">
            <label for="position">Vùng/Miền</label>
            <select class="form-control" id="position" onchange="mapsvin.searchPosition(this);">
            </select>
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <label for="location">Tỉnh/Thành Phố</label>
            <select class="form-control" id="location" onchange="mapsvin.searchLocation(this);">
            </select>
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <label for="district">Quận/Huyện</label>
            <select class="form-control" id="district" onchange="mapsvin.searchDistrict(this);">

            </select>
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <label for="store">Tên Cửa Hàng</label>
            <input name="store" type="text" class="form-control" id="store" autofocus>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-3">
        <div id="search-card" class="text-center" style="padding: 10px">
            <span id="total-card" class="badge badge-danger">0</span> cửa hàng được tìm thấy
        </div>
        <div id="list-card">
            
        </div>
    </div>
    <div class="col-9" style="border: 1px solid red;">
    	<div id="map"></div>
    </div>
</div>

<script type="text/javascript">
    
</script>