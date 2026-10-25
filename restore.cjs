const fs = require('fs');
const lines = fs.readFileSync('C:/Users/MSI/.gemini/antigravity/brain/7fb9ef2d-4e6f-4d0b-88bd-2057c4f1e97e/.system_generated/logs/transcript_full.jsonl', 'utf8').split('\n').filter(Boolean);
for (const line of lines) {
    const obj = JSON.parse(line);
    if (obj.tool_calls) {
        for (const tc of obj.tool_calls) {
            let args;
            try {
                args = tc.function ? JSON.parse(tc.function.arguments) : tc.args;
            } catch (e) { continue; }
            if (args && args.TargetFile && args.TargetFile.includes('portal-resmi.blade.php') && args.CodeContent) {
                fs.writeFileSync('resources/views/portal-resmi.blade.php', args.CodeContent);
                console.log('Restored portal-resmi.blade.php!');
                process.exit(0);
            }
        }
    }
}
