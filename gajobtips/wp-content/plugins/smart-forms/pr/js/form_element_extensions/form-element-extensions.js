function SmartFormsPRAddExtension(elementName)
{
    sfFormElementBase.Extensions.push({Name:elementName,Create:function(options){return new sfFileUpload(options)}});
}

SmartFormsPRAddExtension('sfFileUpload');
/************************************************************************************* File Upload ***************************************************************************************************/
function sfFileUpload(options)
{
    sfFormElementBase.call(this,options);
    this.Title="Title";

    if(this.IsNew)
    {
        this.Options.ClassName="sfFileUpload";
        this.Options.Title="Title";
        this.Options.Label="Upload File";
        this.Options.Multiple="n";
        this.Options.IsRequired="n";
    }


}

sfFileUpload.prototype=Object.create(sfFormElementBase.prototype);

sfFileUpload.prototype.CreateProperties=function()
{
    this.Properties.push(new SimpleTextProperty(this,this.Options,"Label","Label",{ManipulatorType:'basic'}));
    this.Properties.push(new CheckBoxProperty(this,this.Options,"Multiple","Multiple files",{ManipulatorType:'basic'}));
    this.Properties.push(new CheckBoxProperty(this,this.Options,"IsRequired","Required",{ManipulatorType:'basic'}));
}

sfFileUpload.prototype.GenerateInlineElement=function()
{
    var disabled="";
    return '<div class="rednao_label_container"><label class="rednao_control_label" >'+this.Options.Label+'</label></div>\
            <div class="redNaoControls"></div>';
}


sfFileUpload.prototype.GetFileUploadComponent=function(jQueryFileContainer)
{
    var component= rnJQuery('<div class="sfUploadFileElement"><input class="sfUploadFilePath" placeholder="Choose File" disabled="disabled" type="text" />\
                <div class="sfUploadFileContainer">\
                    <span class="sfUploadFileButtonText">Upload</span>\
                    <input class="sfUploadFileButton" type="file" name="'+this.Id+'" class="upload"/>\
                </div>\
                <div class="sfDeleteButton sfDeletebutton_invisible"></div></div>');

    var self=this;
    component.find('.sfUploadFileButton').change(
    function(){
        var selectedPath=component.find('.sfUploadFileButton').val();
        component.find('.sfUploadFilePath').val(selectedPath);
        if(selectedPath=="")
        {
            component.find(".sfDeleteButton").removeClass("sfDeleteButton_visible").addClass("sfDeleteButton_invisible");
            self.DeleteComponent(component);
        }
        else
        {
            component.find(".sfDeleteButton").removeClass("sfDeleteButton_invisible").addClass("sfDeleteButton_visible");
            if(self.Options.Multiple=="y")
            {
                var emptyElements=0;
                rnJQuery('#'+self.Id+ ' .sfUploadFileButton').each(
                    function()
                    {
                        if(rnJQuery(this).val()=="")
                        {
                            emptyElements++;
                        }
                    }
                );
                if(emptyElements==0)
                    self.AppendComponent(jQueryFileContainer)
            }
        }
    });

    component.find(".sfDeleteButton").click(
    function()
    {
        self.DeleteComponent(component);
    })
    return component;
}

sfFileUpload.prototype.DeleteComponent=function(component)
{

    if(rnJQuery('#'+this.Id+ ' .sfUploadFileButton').length>1)
        component.remove();
}

sfFileUpload.prototype.GenerationCompleted=function(jQueryElement)
{
    this.AppendComponent(jQueryElement);
}

sfFileUpload.prototype.AppendComponent=function(jQueryElement)
{
    var fileUploadComponent=this.GetFileUploadComponent(jQueryElement);
    jQueryElement.find('.redNaoControls').append(fileUploadComponent);
    if(smartFormsDesignMode)
    {
        jQueryElement.find('.sfUploadFilePath').removeAttr('disabled');
        jQueryElement.find('.sfUploadFileButton').remove();
    }

    jQueryElement.find('.sfUploadFileElement').removeClass('sfUploadFilePathMargin');
    jQueryElement.find('.sfUploadFileElement:not(:last-child)').addClass('sfUploadFilePathMargin');
}

sfFileUpload.prototype.GetValueString=function () {
    var data= [];
    var count=1;
    var self=this;
    if(this.IsIgnored())
        return [];
    rnJQuery('#'+this.Id+ ' .sfUploadFileButton').each(function()
    {
        var jqueryFileElement=rnJQuery(this);
        if(jqueryFileElement.val().trim()!="")
        {
            var fieldName="sfufn"+"@"+self.Id+"@"+count.toString();
            jqueryFileElement.attr('name',fieldName);
            data.push( {path:fieldName});
            count++;
        }else
            jqueryFileElement.removeAttr('name');
    });

    return data;

}

sfFileUpload.prototype.IsValid=function()
{
    if(this.Options.IsRequired=='n')
        return true;

    var isValid=false;
    rnJQuery('#'+this.Id+ ' .sfUploadFileButton').each(
        function()
        {
            if(rnJQuery(this).val()!="")
            {
                isValid=true;
            }
        }
    );

    if(isValid)
        return true;

    var self=this;
    rnJQuery('#'+this.Id+ ' .sfUploadFileButton').each(
        function()
        {
            if(rnJQuery(this).val()=="")
            {
                rnJQuery('#'+self.Id).find('.sfUploadFilePath').addClass('redNaoInvalid');
                isValid=false;
            }
        }
    );

    return false;
}

sfFileUpload.prototype.StoresInformation=function()
{
    return true;
}