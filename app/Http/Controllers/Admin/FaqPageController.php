<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PageFaq;
use App\Models\PageFaqItem;

class FaqPageController extends Controller
{
    public function index()
    {
        $page = PageFaq::with('items')->first();
        return view('pages.faq', compact('page'));
    }

    public function store(Request $request)
    {
        $page = PageFaq::updateOrCreate(['id' => 1], [
            'title' => $request->title,
            'title_ar' => $request->title_ar,
            'description' => $request->description,
            'description_ar' => $request->description_ar,
        ]);

        // Delete existing items
        PageFaqItem::where('faq_page_id', $page->id)->delete();

        // Recreate FAQ items
        if ($request->faq_question && is_array($request->faq_question)) {
            foreach ($request->faq_question as $key => $question) {
                if (!empty($question)) {
                    PageFaqItem::create([
                        'faq_page_id'   => $page->id,
                        'question'      => $question,
                        'answer'        => $request->faq_answer[$key] ?? '',
                        'question_ar'   => $request->faq_question_ar[$key] ?? '',
                        'answer_ar'     => $request->faq_answer_ar[$key] ?? '',
                    ]);
                }
            }
        }

        return response()->json(['status' => 'success', 'message' => 'FAQ Page Updated Successfully!']);
    }
}