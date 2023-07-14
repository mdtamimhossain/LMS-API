<?php

namespace App\Http\Services\teacher;

use App\Http\Services\Service;
use App\Models\Category;
use App\Models\Course;
use App\Models\enrollment;
use App\Models\Post;
use App\Models\PostComment;
use App\Models\Teacher;

use App\Models\User;
use App\Models\Video;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class teacherService extends Service
{
    /**
     * @param array $data
     * @return array
     */

    public function addCourse(array $data): array
    {
        try{
            $category=Category::where('id',$data['category_id'])->get();
            if(!$category)
                return $this->responseError("No category with the id given");
            $imagePath = $data['thumbnail']->store('public/thumbnail');
            Course::create([
               'course_name'=>$data['course_name'],
               'category_id'=>$data['category_id'],
               'user_id'=>Auth::id(),
               'description'=>$data['description'],
                'thumbnail'=>$imagePath,
                'slug'=>strtolower(str_replace(' ','-',$data['course_name'])),
            ]);
            return $this->responseSuccess('New Course Added  successfully');
        }catch (\Exception $exception)
        {
            return $this->responseError($exception->getMessage());
        }
    }

    /**
     * @param array $data
     * @return array
     */
    public function addVideo(array $data): array
    {
        try{
            $course=Course::where('user_id',Auth::id())->where('id',$data['course_id'])->get();

            if(!$course){
                return $this->responseError('you are not authorized to perform this action');
            }
            $videoPath = $data['video']->store(`public/"$course->name"/video`);
            Video::create([
                'course_id'=>$data['course_id'],
                'title'=>$data['title'],
                'video'=>$videoPath
            ]);
            return $this->responseSuccess('edit Category page ',['data'=>$data]);
        }catch (\Exception $exception)
        {
            return $this->responseError($exception->getMessage());
        }
    }


    /**
     * @return array
     */
    public function getCourses(): array
    {
        try{
            $courses=Course::where('user_id',Auth::id())->get();
            if(!$courses)
            {
                return $this->responseError("No Course available for this teacher");
            }
            return $this->responseSuccess('All teaching application',['data'=>$courses]);
        }catch (\Exception $exception)
        {
            return $this->responseError($exception->getMessage());
        }
    }

    /**
     * @param $id
     * @return array
     */
    public function getCourse($id): array
    {
        try{
            $course=Course::find($id);
            if(!$course)
            {
                return $this->responseError("No Course found with the id given");
            }
            return $this->responseSuccess('All teaching application',['data'=>$course]);
        }catch (\Exception $exception)
        {
            return $this->responseError($exception->getMessage());
        }
    }

    /**
     * @param array $data
     * @return array
     */
    public function updateCourseName(array $data): array
    {
        try{
            $course=Course::findOrFail($data['course_id']);
            if(!$course)
            {
                return $this->responseError("No Course found with the id given");
            }
            $course->course_name=$data['course_name'];
            $course->save();
            return $this->responseSuccess('Course Name updated successfully');
        }catch (\Exception $exception)
        {
            return $this->responseError($exception->getMessage());
        }
    }

    /**
     * @param array $data
     * @return array
     */
    public function updateCourseDescription(array $data): array
    {
        try{
            $course=Course::findOrFail($data['course_id']);
            if(!$course)
            {
                return $this->responseError("No Course found with the id given");
            }
            $course->description=$data['description'];
            $course->save();
            return $this->responseSuccess('Course Description updated successfully');
        }catch (\Exception $exception)
        {
            return $this->responseError($exception->getMessage());
        }
    }

    /**
     * @param array $data
     * @return array
     */
    public function updateCourseThumbnail(array $data): array
    {
        try{
            $course=Course::findOrFail($data['course_id']);
            if(!$course)
            {
                return $this->responseError("No Course found with the id given");
            }
            $imagePath = $data['thumbnail']->store('public/thumbnail');
            $course->thumbnail=$imagePath;
            $course->save();
            return $this->responseSuccess('Course Thumbnail updated successfully');
        }catch (\Exception $exception)
        {
            return $this->responseError($exception->getMessage());
        }
    }
    public function addPost(array $data): array
    {
        try{
            $course=Course::where('user_id',Auth::id())->findOrFail($data['course_id']);

            if(!$course){
                return $this->responseError('you are not authorized to perform this action');
            }
            $filePath = $data['file']->store(`public/"$course->course_name"/file`);

            Post::create([
                'course_id'=>$data['course_id'],
                'user_id'=>Auth::id(),
                'caption'=>$data['caption'],
                'file'=>$filePath
            ]);
            return $this->responseSuccess('post added successfully');
        }catch (\Exception $exception)
        {
            return $this->responseError($exception->getMessage());
        }
    }
    public function getPosts($id): array
    {
        try{
            $course=Course::where('user_id',Auth::id())->findOrFail($id);

            if(!$course){
                return $this->responseError('you are not authorized to perform this action');
            }

            $posts=Post::where('course_id',$id)->get();
            return $this->responseSuccess('post added successfully',['data'=>$posts]);
        }catch (\Exception $exception)
        {
            return $this->responseError($exception->getMessage());
        }
    }
    public function deletePost($id): array
    {
        try{
            $post=Post::where('user_id',Auth::id())->findOrFail($id);
            if(!$post){
                return $this->responseError(`you are not authorized or post doesn't exist` );
            }
            $post->delete();
            return $this->responseSuccess('post deleted successfully');
        }catch (\Exception $exception)
        {
            return $this->responseError($exception->getMessage());
        }
    }
    public function comment(array $data): array
    {
        try{

            $post=Post::where('user_id',Auth::id())->findOrFail($data['post_id']);

            if(!$post){
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
            $post=Post::where('user_id',Auth::id())->findOrFail($id);
            if(!$post){
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
