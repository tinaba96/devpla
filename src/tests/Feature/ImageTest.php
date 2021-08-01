<?php 

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Illuminate\Foundation\Testing\WithoutMiddleware;

use Tests\TestCase;
use App\User;
use App\Images;

class ImageTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
	use DatabaseMigrations;
    public function testBasic()
    {
	    $user = factory(User::class)->create([
		'name' => 'test',
		'email' => 'test@test.com',
		#'email_verified_at' => 'test@test.com',
		'password' => '$2y$10$92IXUNpkjO0rOQ5by', 
		#'remember_token' => Str::random(10),
		]);
		
	$response = $this->actingAs($user)->get('/');


        $response->assertStatus(200);
    }
    public function testBasicImageDb()
    {
	    $user = factory(User::class)->create([
		'name' => 'test',
		'email' => 'test@test.com',
		'password' => '$2y$10$92IXUNpkjO0rOQ5by', 
		]);
		
	$response = $this->actingAs($user)->get('/list');


        $response->assertStatus(200);
    }
    public function testImageDb()
    {
	    factory(Images::class)->create([
		'file_name' => 'tesingimage',
		'file_path' => 'tesingdb',
		]);

	factory(Images::class)->create();

	$this->assertDatabaseHas('images', [
		'file_name' => 'tesingimage',
		'file_path' => 'tesingdb',
		]);
    }


    public function testPostImage()
    {
	    Storage::fake('images');

	    #$image = new ImageService();

	    # produce a image
	    $uploadedfile = UploadedFile::fake()->image('image.jpg');

	    #$response = $this->json('POST', 'storage/app/public/uploads/image', [
	    #$response = $this->json('POST', '/storage/framework/testing/disks/images', [

	    #$response = $this->json('POST', '/form', [
	    #$response = $this->json('POST', route('upload_image'), [
	    #	    'upload_image'=>$uploadedfile,
	    #]);

	    $uploadedfile-> move('storage/framework/testing/disks/images');
	    #$uploadedfile-> move('storage/app/public/uploads');

	    #$image -> upload($uploadedfile);

	    #Storage::disk('images')->assertExists($uploadedfile->name);
	    #Storage::disk('images')->assertExists($uploadedfile->getFilename());
	    #Storage::disk('storage/app/public/uploads')->assertExists($uploadedfile->hashName());
	    
	    #Storage::disk('images')->assertExists($uploadedfile->hashName());
	    Storage::disk('images')->assertExists($uploadedfile->getFilename());
	    Storage::disk('images')->assertMissing('missing.jpg');

	    
    }
}

