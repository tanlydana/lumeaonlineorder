<?php
    require_once 'app/models/Category.php';
    // go to categorypage
    class CategoryController{
        public function index(){
            $views = 'app/views/pages/categorypage.php';
            include 'app/views/layout.php';
        }
    public function createData(){
            // get value from frontend form by method post
            $userid = $_POST['userid'] ?? '';
            $type = $_POST['type'] ?? '';
            
            if(empty($userid) || empty($type)){
                echo "Form is empty please input again";
            }
            // create object for calling function in model
            $categoryModel = new Category();
            $rs = $categoryModel->create($userid,$type);

            // check if success send name and email back
            if($rs){
                echo 'success';
            }
            // if not message error
            else{
                echo 'Failed to create data'; // ✅ Send error to front-end
            }
        }

    public function fetchData(){

        $userid = $_POST['userid'] ?? '';
        $categoryModel = new Category();
        $category = $categoryModel->read($userid);
        $count = 0;

        if(!empty($category)){
            foreach($category as $cate){
                $count++;
                $id = $cate['id'];
                $type = $cate['type'];
                $created_at = $cate['created_at'];
                $username = $cate['username'];

                echo <<<HTML
                    <tr>
                        <td>$count</td>
                        <td>$type</td>
                        <td>Add by <span class="text-success fw-bold">$username</span></td>
                        <td>
                        <span
                            class="text-secondary bg-secondary-subtle rounded-3 px-2 fw-medium"
                            >Date was created : $created_at</span
                        >
                        </td>
                        <td class="text-center">
                        <button
                            title="Edit Data"
                            class="btn-edit btn btn-warning"

                            data-id = "$id"
                            data-type = "$type"

                            data-bs-toggle="modal"
                            data-bs-target="#upType"
                        >
                            <i class="bi bi-pencil"></i>
                        </button>
                        <button 
                            data-id="$id"
                            class="btn-delete btn btn-danger"
                            data-bs-toggle="modal"
                            data-bs-target="#delete-category"
                        >
                            <i class="bi bi-trash3-fill"></i>
                        </button>
                        </td>
                    </tr>
                HTML;
            }
        }else{
            echo <<<HTML
                    <tr>
                        <td colspan="8">
                            <p class="text-center m-0 text-secondary">No data found</p>
                        </td>
                    </tr>
            HTML;
        }

    }
    public function deleteData(){
        $id = $_POST['id'] ?? "";
        // echo "Controller can get id : ".$id;

        $categoryModel = new Category();
        $rs = $categoryModel->delete($id);
        if($rs){
            echo "success";
        }else{
            echo "Fail to delete data";
        }

    }
    public function updateData(){
            // get value from frontend form by method post
            $id = $_POST['id'] ?? '';
            $type = $_POST['type'] ?? '';
            
            if(empty($id) || empty($type)){
                echo "Form is empty please input again";
                return;
            }
            // create object for calling function in model
            $categoryModel = new Category();
            $rs = $categoryModel->update($id,$type);

            // check if success send name and email back
            if($rs){
                echo 'success';
            }
            // if not message error
            else{
                echo 'Failed to create data'; // ✅ Send error to front-end
            }
    }   

    }
?>