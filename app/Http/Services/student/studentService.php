<?php

namespace App\Http\Services\student;
use App\Http\Services\Service;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Post;
use App\Models\PostComment;
use App\Models\Video;
use Illuminate\Support\Facades\Auth;

class studentService extends Service
{
    /**
     * @param array $data
     * @return array
     */

    public function courseEnroll($id): array
    {
        try{
            Enrollment::create([
                'course_id'=>$id,
                'student_id'=>Auth::id(),
            ]);
            return $this->responseSuccess('You have enrolled this course successfully');
        }catch (\Exception $exception)
        {
            return $this->responseError($exception->getMessage());
        }
    }

    /**
     * @param array $data
     * @return array
     */
    public function enrolledCourses(): array
    {
        try{
                $course_ids=Enrollment::where('student_id',Auth::id())->where('cancel',false)->get();
                $courses=[];
            foreach($course_ids as $course_id)
            {
                $courses[]=Course::find($course_id['course_id']);
            }

            return $this->responseSuccess('All enrolled courses',['data'=>$courses]);
        }catch (\Exception $exception)
        {
            return $this->responseError($exception->getMessage());
        }
    }
    public function enrolledCourse($id): array
    {
        try{
                $course=Course::findOrFail($id);
            return $this->responseSuccess('All enrolled courses',['data'=>$course]);
        }catch (\Exception $exception)
        {
            return $this->responseError($exception->getMessage());
        }
    }
    public function courseVideo($id): array
    {
        try{
            $videos=Video::where('course_id',$id)->get();
            if(!$videos)
                return $this->responseError('No video available in these course');
            return $this->responseSuccess('All enrolled courses',['data'=>$videos]);
        }catch (\Exception $exception)
        {
            return $this->responseError($exception->getMessage());
        }
    }
    public function cancelCourse($id): array
    {
        try{
            $enrollment=Enrollment::where('student_id',Auth::id())->where('cancel',false)->findOrFail($id);
            if(!$enrollment){
                return $this->responseError('you are not authorized to perform this action');
            }
            $enrollment->cancel = true;
            $enrollment->save();
            return $this->responseSuccess('Leave from course successfully');
        }catch (\Exception $exception)
        {
            return $this->responseError($exception->getMessage());
        }
    }
    public function getPosts($id): array
    {
        try{
            $enrollment=Enrollment::where('student_id',Auth::id())->findOrFail($id);


            if(!$enrollment){
                return $this->responseError('you are not authorized to perform this action');
            }
            $posts=Post::where('course_id',$id)->get();
            return $this->responseSuccess('all post',['data'=>$posts]);
        }catch (\Exception $exception)
        {
            return $this->responseError($exception->getMessage());
        }
    }
    public function comment(array $data): array
    {
        try{
            $post=Post::findOrFail($data['post_id']);
            $enrollment=Enrollment::where('student_id',Auth::id())->findOrFail($post->course_id);

            if(!$enrollment){
                return $this->responseError('you are not authorized to perform this action');
            }
            PostComment::create([
                'post_id'=>$data['post_id'],
                'user_id'=>Auth::id(),
                'content'=>$data['content']
            ]);
            return $this->responseSuccess('comment successfully');
        }catch (\Exception $exception)
        {
            return $this->responseError($exception->getMessage());
        }
    }
    public function allComment($id): array
    {
        try{
            $post=Post::findOrFail($id);
            $enrollment=Enrollment::where('student_id',Auth::id())->findOrFail($post->course_id);

            if(!$enrollment){
                return $this->responseError('you are not authorized to perform this action');
            }
            $comments=PostComment::where('post_id',$id)->get();
            return $this->responseSuccess('all comment',['data'=>$comments]);
        }catch (\Exception $exception)
        {
            return $this->responseError($exception->getMessage());
        }
    }
    public function deleteComment($id): array
    {
        try{
            $comment=PostComment::where('user_id',Auth::id())->findOrFail($id);
            if(!$comment){
                return $this->responseError('you are not authorized to perform this action');
            }
            $comment->delete();
            return $this->responseSuccess('comment deleted successfully');
        }catch (\Exception $exception)
        {
            return $this->responseError($exception->getMessage());
        }
    }

}
