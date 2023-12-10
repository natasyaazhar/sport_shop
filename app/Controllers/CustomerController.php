<?php

namespace App\Controllers;

use App\Models\CustomerModel;

class CustomerController extends BaseController
{
    public function __construct()
    {
        helper(['url']);
        $this->customer = new CustomerModel();
    }
    public function index()
    {
        $data['customerList']   = $this->customer->orderby('id', 'DESC')
                                    ->where('soft_delete', 0)
                                    ->paginate(3, 'group1');
        $data['pager']          = $this->customer->pager;

        echo view('masterpage');
        echo view('customer/list_css');
        echo view('customer/list_js');
        echo view('customer/list', $data);
    }

    public function storeList()
    {
        try
        {
            $data = [            
                'name' => $this->request->getPost('cust_name'),
                'email' => $this->request->getPost('cust_email'),
                'no_phone' => $this->request->getPost('cust_no_phone'),
                'skillset' => $this->request->getPost('cust_skillset'),
                'hobby' => $this->request->getPost('cust_hobby')
            ];
    
            $this->customer->insert($data);
    
            return redirect('/')->with('status', 'Customer inserted successfully');
        }
        catch (\Exception $e) 
        {
            exit($e->getMessage());
        }
    }

    public function getOne($id)
    {
        try
        {
            $data = $this->customer->where('id', $id)->first();
    
            echo json_encode($data);
        }
        catch (\Exception $e) 
        {
            exit($e->getMessage());
        }
    }

    public function updateList()
    {
        try{
            $id   = $this->request->getPost('cust_id');
    
            $data = [            
                'name' => $this->request->getPost('cust_name'),
                'email' => $this->request->getPost('cust_email'),
                'no_phone' => $this->request->getPost('cust_no_phone'),
                'skillset' => $this->request->getPost('cust_skillset'),
                'hobby' => $this->request->getPost('cust_hobby')
            ];
    
            $this->customer->update($id, $data);
    
            return redirect('/')->with('status', 'Customer updated successfully');
        }
        catch (\Exception $e) 
        {
            exit($e->getMessage());
        }

    }

    public function deleteList()
    {
        try 
        {
            $ids   = $this->request->getPost('delete_id');
            $data = [            
                'soft_delete' => '1'
            ];

            $this->customer->update($ids, $data);
    
            return redirect('/')->with('status', 'Customer deleted successfully');
        }
        catch (\Exception $e) 
        {
            exit($e->getMessage());
        }
    }

    public function deleteAllList()
    {
        try
        {
            $ids   = $this->request->getVar('ids');

            $data = [            
                'soft_delete' => '1'
            ];

            foreach( $ids as $index => $id)
            {
                $this->customer->update($id, $data);
            }
    
            return redirect('/')->with('status', 'Customer deleted successfully');
        }
        catch (\Exception $e) 
        {
            exit($e->getMessage());
        }
    }
    
}
