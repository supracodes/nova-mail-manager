<?phpnamespace Database\Factories;use App\Models\Customer;use Illuminate\Database\Eloquent\Factories\Factory;class CustomerFactory extends Factory{    protected $model = Customer::class;    public function definition(): array    {        return [            'name' => fake()->name,            'email' => fake()->userName . '@' . collect(['yahoo.com','gmail.com','outlook.com'])->random(),            'phone' => fake()->phoneNumber,        ];    }}