@extends('backend.master')

@section('title')
<title>Trang quản trị</title>
@endsection

@section('modal')
<div class="tittle">
 <h1>Sản phẩm <small style="color: #BEA8A8;">Danh sách bài hát</small></h1>
</div>

<!-- Search and add new -->
<div class="row">
 <div class="search form-inline col-sm-10">    
  <input class="form-control mr-sm-2" type="search" placeholder="Tìm kiếm" aria-label="Search" id="searchInput">
  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm kiếm</button>       
</div>
<div class="add form-inline col-sm-2">
 <button class="btn btn-success my-7 my-sm-0" data-toggle="modal" data-target="#exampleModalCenter">Thêm mới</button>
</div>
</div>

<!-- modal add new -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
 <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
   <div class="modal-content">
     <div class="modal-header">
       <h5 class="modal-title" id="exampleModalLongTitle">Thêm mới bài hát</h5>
       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">&times;</span>
       </button>
     </div>

     <div class="modal-body">
      <div class="container-fluid">

        <form>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="nameOfSong">Tên bài hát</label>
              <input type="text" class="form-control" id="nameOfSong" placeholder="Tên bài hát">
            </div>
            <div class="form-group col-md-6">
              <label for="nameOfSingle">Ca sĩ thể hiện</label>
              <input type="text" class="form-control" id="nameOfSingle" placeholder="Ca sĩ">
            </div>
          </div>
          <div class="form-group">
            <label for="linkOfSong">Link bài hát</label>
            <input type="text" class="form-control" id="linkOfSong" placeholder="Link bài hát">
          </div>
          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="typeOfSong">Thể Loại</label>
              <input type="text" class="form-control" id="typeOfSong">
            </div>
            <div class="form-group col-md-4">
              <label for="albumOfSong">Album</label>
              <select id="albumOfSong" class="form-control">
                <option selected>Loại album</option>
                <option>...</option>
              </select>
            </div>
            <div class="form-group col-md-4">
              <label for="playlistOfSong">Playlist</label>
              <input type="text" class="form-control" id="playlistOfSong">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="inputCity">Logo</label>
              <input type="file" class="form-control" id="inputCity">
            </div>
          </div>
        </form>


      </div>
    </div>



    <div class="modal-footer">
     <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
     <button type="button" class="btn btn-primary">Thêm bài hát</button>
   </div>
 </div>

</div>
</div>
@endsection 

<!-- content  -->
@section('content')
<div class="main">
 <table class="table table-hover">
   <thead>
     <tr>
       <th scope="col">#</th>
       <th scope="col">Tên bài hát</th>
       <th scope="col">Hình ảnh</th>
       <th scope="col">Trạng Thái</th>
       <th scope="col">Tùy Chỉnh</th>
       <th scope="col">Chi Tiết</th>
     </tr>
   </thead>
   <tbody id="myTable">

     <tr>
       <th scope="row">1</th>
       <td class="item">SamSung Galaxy Note 10 Plus 512GB</td>
       <td><img src="https://cdn.tgdd.vn/Products/Images/42/217936/samsung-galaxy-s20-plus-600x600-fix-600x600.jpg" style="width: 50px; height: 50px;"></td>
       <td><a href=""><span class="badge badge-success">Active<span></a></td>
         <td>
           <a href="#" class="btn btn-danger"><i class="far fa-trash-alt"></i> Xóa</a>
           <a href="#" class="btn btn-primary"><i class="far fa-edit"></i> Chỉnh Sửa</a>
         </td>
         <td><a href="#" class="btn btn-info"><i class="fas fa-info"></i> Chi tiết</a></td>
       </tr>

       <tr>
         <th scope="row">2</th>
         <td class="item">iPhone XS Max 256GB</td>
         <td><img src="https://cdn.tgdd.vn/Products/Images/42/190322/iphone-xs-max-256gb-white-600x600.jpg" style="width: 50px; height: 60px;"></td>
         <td><a href=""><span class="badge badge-success">Active<span></a></td>
           <td>
             <a href="#" class="btn btn-danger"><i class="far fa-trash-alt"></i> Xóa</a>
             <a href="#" class="btn btn-primary"><i class="far fa-edit"></i> Chỉnh Sửa</a>
           </td>
           <td><a href="#" class="btn btn-info"><i class="fas fa-info"></i> Chi tiết</a></td>
         </tr>

         <tr>
           <th scope="row">3</th>
           <td class="item">iPhone 11 64GB</td>
           <td><img src="https://cdn.tgdd.vn/Products/Images/42/153856/iphone-11-red-600x600.jpg" style="width: 50px; height: 60px;"></td>
           <td><a href=""><span class="badge badge-success">Active<span></a></td>
             <td>
               <a href="#" class="btn btn-danger"><i class="far fa-trash-alt"></i> Xóa</a>
               <a href="#" class="btn btn-primary"><i class="far fa-edit"></i> Chỉnh Sửa</a>
             </td>
             <td><a href="#" class="btn btn-info"><i class="fas fa-info"></i> Chi tiết</a></td>

           </tr>
           <tr>
             <th scope="row">4</th>
             <td class="item">iPhone 11 Pro 256GB</td>
             <td><img src="https://cdn.tgdd.vn/Products/Images/42/210655/iphone-11-pro-256gb-black-600x600.jpg" style="width: 50px; height: 60px;"></td>
             <td><a href=""><span class="badge badge-success">Active<span></a></td>
               <td>
                 <a href="#" class="btn btn-danger"><i class="far fa-trash-alt"></i> Xóa</a>
                 <a href="#" class="btn btn-primary"><i class="far fa-edit"></i> Chỉnh Sửa</a>
               </td>
               <td><a href="#" class="btn btn-info"><i class="fas fa-info"></i> Chi tiết</a></td>

             </tr>
             <tr>
               <th scope="row">5</th>
               <td class="item">SamSung Galaxy Ford</td>
               <td><img src="https://cdn.tgdd.vn/Products/Images/42/198158/samsung-galaxy-fold-black-600x600.jpg" style="width: 50px; height: 60px;"></td>
               <td><a href=""><span class="badge badge-danger">Block<span></a></td>
                 <td>
                   <a href="#" class="btn btn-danger"><i class="far fa-trash-alt"></i> Xóa</a>
                   <a href="#" class="btn btn-primary"><i class="far fa-edit"></i> Chỉnh Sửa</a>
                 </td>
                 <td><a href="#" class="btn btn-info"><i class="fas fa-info"></i> Chi tiết</a></td>

               </tr>
             </tbody>
           </table>
         </div>
         @endsection


