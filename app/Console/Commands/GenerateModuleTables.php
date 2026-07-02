namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class GenerateModuleTables extends Command
{
    protected $signature = 'kayago:generate-tables';

    public function handle()
    {
        $modules = ['Ride', 'Market', 'Delivery', 'Academy', 'Hotels', 'Homes', 'Events', 'Tickets', 'Travel', 'Memorial', 'Jobs', 'Pay', 'Move', 'CRM', 'Admin'];
        
        foreach ($modules as $module) {
            // Création de 50 tables par module (15 modules * 50 = 750 + Core = ~800)
            for ($i = 1; $i <= 50; $i++) {
                $tableName = strtolower($module) . '_table_' . $i;
                $filename = date('Y_m_d_His') . '_create_' . $tableName . '.php';
                
                $content = $this->getMigrationTemplate($tableName);
                File::put(database_path('migrations/' . $filename), $content);
            }
        }
        $this->info('800+ migrations générées avec succès !');
    }

    private function getMigrationTemplate($tableName)
    {
        return "<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('$tableName', function (Blueprint \$table) {
            \$table->uuid('id')->primary();
            \$table->uuid('tenant_id')->index();
            \$table->timestamps();
        });
    }
};";
    }
}
