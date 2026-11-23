<?php

// Quick test script to verify fuel type relationships
require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\VehicleModel;
use App\Models\FuelType;

echo "Testing Fuel Type Relationships\n";
echo "===============================\n\n";

// Check if we have any vehicle models
$vehicleModels = VehicleModel::all();
echo "Total Vehicle Models: " . $vehicleModels->count() . "\n";

foreach ($vehicleModels as $model) {
    echo "Model: {$model->name} (ID: {$model->id})\n";
    $fuelTypes = $model->fuelTypes;
    echo "  Fuel Types: " . $fuelTypes->count() . "\n";
    foreach ($fuelTypes as $fuelType) {
        echo "    - {$fuelType->name}\n";
    }
    echo "\n";
}

// Check all fuel types
$allFuelTypes = FuelType::all();
echo "All Fuel Types Available:\n";
foreach ($allFuelTypes as $fuelType) {
    echo "- {$fuelType->name} (ID: {$fuelType->id})\n";
}

echo "\nTest completed.\n";