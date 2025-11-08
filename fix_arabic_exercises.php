<?php
require_once 'config.php';

$db = getLanguageDB();

// Get all multiple_choice exercises for Arabic (language_id = 4, lesson_id >= 117)
$stmt = $db->prepare("SELECT id, data FROM exercises WHERE lesson_id >= 117 AND type = 'multiple_choice'");
$stmt->execute();
$exercises = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo "Fixar " . count($exercises) . " multiple_choice övningar...\n\n";

foreach ($exercises as $exercise) {
    $data = json_decode($exercise['data'], true);
    
    // If 'correct' is a string, find its index in options
    if (isset($data['correct']) && is_string($data['correct'])) {
        $correctText = $data['correct'];
        $correctIndex = array_search($correctText, $data['options']);
        
        if ($correctIndex !== false) {
            $data['correct'] = $correctIndex;
            $newJson = json_encode($data, JSON_UNESCAPED_UNICODE);
            
            $updateStmt = $db->prepare("UPDATE exercises SET data = ? WHERE id = ?");
            $updateStmt->execute([$newJson, $exercise['id']]);
            
            echo "✓ Övning {$exercise['id']}: '{$correctText}' → index {$correctIndex}\n";
        } else {
            echo "✗ Övning {$exercise['id']}: Kunde inte hitta '{$correctText}' i options\n";
        }
    }
}

echo "\n✅ Alla multiple_choice övningar fixade!\n";
