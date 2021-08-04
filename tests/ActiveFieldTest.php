<?php

namespace yiiunit\extensions\bootstrap5;

use yii\base\DynamicModel;
use yii\bootstrap5\ActiveField;
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

class ActiveFieldTest extends TestCase
{
    /**
     * @var ActiveField
     */
    private $activeField;
    /**
     * @var DynamicModel
     */
    private $helperModel;
    /**
     * @var ActiveForm
     */
    private $helperForm;
    /**
     * @var string
     */
    private $attributeName = 'attributeName';

    public function testFileInput()
    {
        Html::$counter = 0;
        $html = $this->activeField->fileInput()->render();

        $expectedHtml = <<<HTML
<div class="mb-3 field-dynamicmodel-attributename">
<label class="form-label" for="dynamicmodel-attributename">Attribute Name</label>
<input type="hidden" name="DynamicModel[attributeName]" value=""><input type="file" id="dynamicmodel-attributename" class="form-control" name="DynamicModel[attributeName]">

<div class="invalid-feedback"></div>
</div>
HTML;

        $this->assertEqualsWithoutLE($expectedHtml, $html);
    }

    public function testRadioList()
    {
        Html::$counter = 0;
        $html = $this->activeField->radioList([1 => 'name1', 2 => 'name2'])->render();

        $expectedHtml = <<<HTML
<div class="mb-3 field-dynamicmodel-attributename">
<label class="form-label">Attribute Name</label>
<input type="hidden" name="DynamicModel[attributeName]" value=""><div id="dynamicmodel-attributename" role="radiogroup"><div class="form-check">
<input type="radio" id="i0" class="form-check-input" name="DynamicModel[attributeName]" value="1">
<label class="form-check-label" for="i0">name1</label>
</div>

<div class="form-check">
<input type="radio" id="i1" class="form-check-input" name="DynamicModel[attributeName]" value="2">
<label class="form-check-label" for="i1">name2</label>
<div class="invalid-feedback"></div>
</div>
</div>

</div>
HTML;
        $this->assertEqualsWithoutLE($expectedHtml, $html);
    }

    // Tests :

    public function testRadioError()
    {
        Html::$counter = 0;
        $this->helperModel->addError($this->attributeName, 'Test print error message');
        $html = $this->activeField->radio()->render();

        $expectedHtml = <<<HTML
<div class="mb-3 field-dynamicmodel-attributename">
<div class="form-check">
<input type="hidden" name="DynamicModel[attributeName]" value="0"><input type="radio" id="dynamicmodel-attributename" class="form-check-input is-invalid" name="DynamicModel[attributeName]" value="1" aria-invalid="true">
<label class="form-check-label" for="dynamicmodel-attributename">Attribute Name</label>
<div class="invalid-feedback">Test print error message</div>

</div>
</div>
HTML;
        $this->assertEqualsWithoutLE($expectedHtml, $html);
    }

    public function testRadioListError()
    {
        Html::$counter = 0;
        $this->helperModel->addError($this->attributeName, 'Test print error message');
        $html = $this->activeField->radioList([1 => 'name1', 2 => 'name2'])->render();

        $expectedHtml = <<<HTML
<div class="mb-3 field-dynamicmodel-attributename">
<label class="form-label">Attribute Name</label>
<input type="hidden" name="DynamicModel[attributeName]" value=""><div id="dynamicmodel-attributename" class="is-invalid" role="radiogroup" aria-invalid="true"><div class="form-check">
<input type="radio" id="i0" class="form-check-input" name="DynamicModel[attributeName]" value="1">
<label class="form-check-label" for="i0">name1</label>
</div>

<div class="form-check">
<input type="radio" id="i1" class="form-check-input" name="DynamicModel[attributeName]" value="2">
<label class="form-check-label" for="i1">name2</label>
<div class="invalid-feedback">Test print error message</div>
</div>
</div>

</div>
HTML;
        $this->assertEqualsWithoutLE($expectedHtml, $html);
    }

    public function testCheckboxList()
    {
        Html::$counter = 0;
        $html = $this->activeField->checkboxList([1 => 'name1', 2 => 'name2'])->render();

        $expectedHtml = <<<HTML
<div class="mb-3 field-dynamicmodel-attributename">
<label class="form-label">Attribute Name</label>
<input type="hidden" name="DynamicModel[attributeName]" value=""><div id="dynamicmodel-attributename"><div class="form-check">
<input type="checkbox" id="i0" class="form-check-input" name="DynamicModel[attributeName][]" value="1">
<label class="form-check-label" for="i0">name1</label>
</div>

<div class="form-check">
<input type="checkbox" id="i1" class="form-check-input" name="DynamicModel[attributeName][]" value="2">
<label class="form-check-label" for="i1">name2</label>
<div class="invalid-feedback"></div>
</div>
</div>

</div>
HTML;
        $this->assertEqualsWithoutLE($expectedHtml, $html);
    }

    public function testCheckboxError()
    {
        Html::$counter = 0;
        $this->helperModel->addError($this->attributeName, 'Test print error message');
        $html = $this->activeField->checkbox()->render();

        $expectedHtml = <<<HTML
<div class="mb-3 field-dynamicmodel-attributename">
<div class="form-check">
<input type="hidden" name="DynamicModel[attributeName]" value="0"><input type="checkbox" id="dynamicmodel-attributename" class="form-check-input is-invalid" name="DynamicModel[attributeName]" value="1" aria-invalid="true">
<label class="form-check-label" for="dynamicmodel-attributename">Attribute Name</label>
<div class="invalid-feedback">Test print error message</div>

</div>
</div>
HTML;
        $this->assertEqualsWithoutLE($expectedHtml, $html);
    }

    public function testCheckboxListError()
    {
        Html::$counter = 0;
        $this->helperModel->addError($this->attributeName, 'Test print error message');
        $html = $this->activeField->checkboxList([1 => 'name1', 2 => 'name2'])->render();

        $expectedHtml = <<<HTML
<div class="mb-3 field-dynamicmodel-attributename">
<label class="form-label">Attribute Name</label>
<input type="hidden" name="DynamicModel[attributeName]" value=""><div id="dynamicmodel-attributename" class="is-invalid" aria-invalid="true"><div class="form-check">
<input type="checkbox" id="i0" class="form-check-input" name="DynamicModel[attributeName][]" value="1">
<label class="form-check-label" for="i0">name1</label>
</div>

<div class="form-check">
<input type="checkbox" id="i1" class="form-check-input" name="DynamicModel[attributeName][]" value="2">
<label class="form-check-label" for="i1">name2</label>
<div class="invalid-feedback">Test print error message</div>
</div>
</div>

</div>
HTML;
        $this->assertEqualsWithoutLE($expectedHtml, $html);
    }

    public function testRadioListInline()
    {
        Html::$counter = 0;
        $this->activeField->inline = true;
        $html = $this->activeField->radioList([1 => 'name1', 2 => 'name2'])->render();

        $expectedHtml = <<<HTML
<div class="mb-3 field-dynamicmodel-attributename">
<label class="form-label">Attribute Name</label>
<input type="hidden" name="DynamicModel[attributeName]" value=""><div id="dynamicmodel-attributename" role="radiogroup"><div class="form-check">
<input type="radio" id="i0" class="form-check-input" name="DynamicModel[attributeName]" value="1">
<label class="form-check-label" for="i0">name1</label>
</div>

<div class="form-check">
<input type="radio" id="i1" class="form-check-input" name="DynamicModel[attributeName]" value="2">
<label class="form-check-label" for="i1">name2</label>
<div class="invalid-feedback"></div>
</div>
</div>

</div>
HTML;
        $this->assertEqualsWithoutLE($expectedHtml, $html);
    }

    public function testCheckboxListInline()
    {
        Html::$counter = 0;
        $this->activeField->inline = true;
        $html = $this->activeField->checkboxList([1 => 'name1', 2 => 'name2'])->render();

        $expectedHtml = <<<HTML
<div class="mb-3 field-dynamicmodel-attributename">
<label class="form-label">Attribute Name</label>
<input type="hidden" name="DynamicModel[attributeName]" value=""><div id="dynamicmodel-attributename"><div class="form-check">
<input type="checkbox" id="i0" class="form-check-input" name="DynamicModel[attributeName][]" value="1">
<label class="form-check-label" for="i0">name1</label>
</div>

<div class="form-check">
<input type="checkbox" id="i1" class="form-check-input" name="DynamicModel[attributeName][]" value="2">
<label class="form-check-label" for="i1">name2</label>
<div class="invalid-feedback"></div>
</div>
</div>

</div>
HTML;
        $this->assertEqualsWithoutLE($expectedHtml, $html);
    }

    /**
     *
     * @see https://github.com/yiisoft/yii2-bootstrap/issues/81
     */
    public function testRadioListItemOptions()
    {
        Html::$counter = 0;
        $content = $this->activeField->radioList([1 => 'name1', 2 => 'name2'], [
            'itemOptions' => [
                'data-attribute' => 'test'
            ]
        ])->render();

        $this->assertContains('data-attribute="test"', $content);
    }

    /**
     *
     * @see https://github.com/yiisoft/yii2-bootstrap/issues/81
     */
    public function testCheckboxListItemOptions()
    {
        Html::$counter = 0;
        $content = $this->activeField->checkboxList([1 => 'name1', 2 => 'name2'], [
            'itemOptions' => [
                'data-attribute' => 'test'
            ]
        ])->render();

        $this->assertContains('data-attribute="test"', $content);
    }

    protected function setUp()
    {
        // dirty way to have Request object not throwing exception when running testHomeLinkNull()
        $_SERVER['SCRIPT_FILENAME'] = "index.php";
        $_SERVER['SCRIPT_NAME'] = "index.php";

        parent::setUp();

        $this->helperModel = new DynamicModel(['attributeName']);
        ob_start();
        $this->helperForm = ActiveForm::begin(['action' => '/something']);
        ActiveForm::end();
        ob_end_clean();

        $this->activeField = new ActiveField(['form' => $this->helperForm]);
        $this->activeField->model = $this->helperModel;
        $this->activeField->attribute = $this->attributeName;
    }
}
