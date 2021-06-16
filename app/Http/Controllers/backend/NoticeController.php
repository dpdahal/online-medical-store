<?php

namespace App\Http\Controllers\backend;

use App\Notice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

class NoticeController extends BackendController
{

    public function index()
    {

        $this->data('noticeData', Notice::orderBy('id', 'DESC')->get());
        return view($this->pagePath . 'notice.show-notice', $this->data);

    }

    public function addNotice(Request $request)
    {
        if ($request->isMethod('get')) {
            $this->data('noticeData', Notice::all());
            return view($this->pagePath . 'notice.add-notice', $this->data);
        }

        if ($request->isMethod('post')) {
            $this->validate($request, [
                'title' => 'required|unique:notices,title',
                'description' => 'required|unique:notices,slug',
                'slug' => 'required',
                'date' => 'required',
            ]);

            $data['title'] = $request->title;
            $data['description'] = $request->description;
            $data['slug'] = $request->slug;
            $data['date'] = $request->date;
            // file upload ==============
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $ext = $file->getClientOriginalExtension();
                $imageName = md5(microtime()) . '.' . $ext;
                $uploadPath = public_path('backend/uploads/images/notice/');
                if (!$file->move($uploadPath, $imageName)) {
                    return redirect()->back();
                }

                $data['image'] = $imageName;

            }

            if (Notice::create($data)) {
                return redirect()->route('show-notice')->with('success', 'Data was inserted');
            }
        }

    }


    public function updateNoticeStatus(Request $request)
    {
        if ($request->isMethod('get')) {
            return redirect()->back();
        }

        if ($request->isMethod('post')) {
            $criteria = $request->criteria;
            $notice = Notice::findOrFail($criteria);

            if (isset($_POST['active'])) {
                $notice->status = 0;
            }
            if (isset($_POST['inactive'])) {
                $notice->status = 1;
            }

            if ($notice->update()) {
                return redirect()->route('show-notice')->with('success', 'status was updated');

            }

        }

        return false;

    }


    public function deleteFile($id)
    {
        $criteria = $id;
        $findData = Notice::findOrFail($criteria);
        $fileName = $findData->image;
        $deletePath = public_path('backend/uploads/images/notice/' . $fileName);
        if (file_exists($deletePath) && is_file($deletePath)) {
            return unlink($deletePath);
        }

        return true;
    }


    public function deleteNotice(Request $request)
    {
        $criteria = $request->criteria;
        $findData = Notice::findOrFail($criteria);
        if ($this->deleteFile($criteria) && $findData->delete()) {
            return redirect()->route('show-notice')->with('success', 'data was deleted');
        }


    }

    public function editNotice(Request $request)
    {
        $criteria = $request->criteria;
        $findData = Notice::findOrFail($criteria);
        $this->data('noticeData', $findData);
        return view($this->pagePath . 'notice.edit-notice', $this->data);
    }

    public function editNoticeAction(Request $request)
    {
        if ($request->isMethod('get')) {
            return redirect()->back();
        }

        if ($request->isMethod('post')) {
            $criteria = $request->criteria;

            $this->validate($request, [
                'title' => 'required|min:20|max:255', [
                    Rule::unique('notices', 'title')->ignore($criteria)
                ],
                'slug' => 'required', [
                    Rule::unique('notices', 'slug')->ignore($criteria)
                ],
                'date' => 'required',
                'description' => 'required'
            ]);

            $data['title'] = $request->title;
            $data['description'] = $request->description;
            $data['slug'] = $request->slug;
            $data['date'] = $request->date;
            // file upload ==============
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $ext = $file->getClientOriginalExtension();
                $imageName = md5(microtime()) . '.' . $ext;
                $uploadPath = public_path('uploads/uploads/images/notice/');
                if ($this->deleteFile($criteria) && $file->move($uploadPath, $imageName)) {
                    $data['image'] = $imageName;
                }
            }

            $notice = Notice::findOrFail($criteria);
            if ($notice->update($data)) {
                return redirect()->route('show-notice')->with('success', 'Data was updates');
            }
        }
    }
}
