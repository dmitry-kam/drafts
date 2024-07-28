// add contacts in LinkedIn
function processBlocks(mutualContacts, timeout) {
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
                        setTimeout(() => {
                            //button.remove();
                            button.click();
                        }, timeout);
                    }
                });
            }
        }
    });
}

processBlocks(20, 5000);