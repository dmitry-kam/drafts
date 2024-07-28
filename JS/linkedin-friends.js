// add contacts in LinkedIn
function processBlocksRightNow(mutualContacts) {
    const emberViews = document.querySelectorAll('.discover-fluid-entity-list li.ember-view');
    emberViews.forEach((view) => {
        const insightsReason = view.querySelector('.member-insights__reason');
        if (insightsReason) {
            const match = insightsReason.textContent.match(/(\d+)\s/);
            if (match && parseInt(match[1], 10) > mutualContacts) {
                const buttons = view.querySelectorAll('button.artdeco-button:not(.artdeco-card__dismiss)');
                buttons.forEach((button) => {
                    const buttonText = button.querySelector('.artdeco-button__text')?.textContent.trim();

                    if (button && buttonText === 'Connect') {
                        //button.remove();
                        button.click();
                    }
                });
            }
        }
    });
}

///////

function processBlocks(mutualContacts, timeout) {
    const emberViews = document.querySelectorAll('.discover-fluid-entity-list li.ember-view');
    let index = 0;

    function clickButtonWithDelay() {
        if (index >= emberViews.length) {
            return;
        }
        const view = emberViews[index];
        const insightsReason = view.querySelector('.member-insights__reason');
        if (insightsReason) {
            const match = insightsReason.textContent.match(/(\d+)\s/);
            if (match && parseInt(match[1], 10) > mutualContacts) {
                const buttons = view.querySelectorAll('button.artdeco-button:not(.artdeco-card__dismiss)');
                buttons.forEach((button) => {
                    const buttonText = button.querySelector('.artdeco-button__text')?.textContent.trim();
                    if (button && buttonText === 'Connect') {
                        button.click();
                    }
                });
            }
        }
        index++;
        setTimeout(clickButtonWithDelay, timeout);
    }
    clickButtonWithDelay();
}

processBlocks(20, 5000);